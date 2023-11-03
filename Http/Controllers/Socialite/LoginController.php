<?php

declare(strict_types=1);

namespace Modules\User\Http\Controllers\Socialite;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Modules\User\Actions\Socialite\GetGuardAction;
use Modules\User\Actions\Socialite\GetLoginRedirectRouteAction;
use Modules\User\Actions\Socialite\GetProviderScopesAction;
use Modules\User\Actions\Socialite\IsProviderConfiguredAction;
use Modules\User\Actions\Socialite\IsRegistrationEnabledAction;
use Modules\User\Actions\Socialite\IsUserAllowedAction;
use Modules\User\Actions\Socialite\RedirectToLoginAction;
use Modules\User\Events\InvalidState;
use Modules\User\Events\Login;
use Modules\User\Events\Registered;
use Modules\User\Events\RegistrationNotEnabled;
use Modules\User\Events\SocialiteUserConnected;
use Modules\User\Events\UserNotAllowed;
use Modules\User\Exceptions\ProviderNotConfigured;
use Modules\User\Models\SocialiteUser;
use Modules\User\Models\User;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

class LoginController extends Controller
{
    /*
    public function __construct(
        protected FilamentSocialite $socialite,
    ) {
    }
    */
    /**
     * Undocumented function.
     *
     * @return Redirector|RedirectResponse
     */
    public function redirectToProvider(string $provider)
    {
        if (! app(IsProviderConfiguredAction::class)->execute($provider)) {
            throw ProviderNotConfigured::make($provider);
        }

        $scopes = App(GetProviderScopesAction::class)->execute($provider);
        $socialite = Socialite::with($provider);
        // Assert::isInstanceOf($socialite, \Laravel\Socialite\Contracts\Provider::class);
        // Assert::methodExists($socialite, 'scopes');
        if (! method_exists($socialite, 'scopes')) {
            throw new \Exception('wip');
        }

        return $socialite
            ->scopes($scopes)
            ->redirect();
    }

    /**
     * @return SocialiteUser
     */
    public function createSocialiteUser(string $provider, SocialiteUserContract $oauthUser, UserContract $user)
    {
        return SocialiteUser::create([
            'user_id' => $user->getKey(),
            'provider' => $provider,
            'provider_id' => $oauthUser->getId(),
        ]);
    }

    /**
     * @return UserContract
     */
    public function createUser(SocialiteUserContract $oauthUser)
    {
        $xot = XotData::make();
        $userClass = $xot->getUserClass();

        return $userClass::create(
            [
                'name' => $oauthUser->getName(),
                'email' => $oauthUser->getEmail(),
            ]
        );
    }

    /**
     * @return RedirectResponse
     */
    public function processCallback(string $provider)
    {
        // See if provider exists
        if (! app(IsProviderConfiguredAction::class)->execute($provider)) {
            throw ProviderNotConfigured::make($provider);
        }

        // Try to retrieve existing user
        $oauthUser = $this->retrieveOauthUser($provider);
        if (! $oauthUser instanceof SocialiteUserContract) {
            return app(RedirectToLoginAction::class)->execute('auth.login-failed');
        }

        // Verify if user is allowed
        if (! app(IsUserAllowedAction::class)->execute($oauthUser)) {
            UserNotAllowed::dispatch($oauthUser);

            return app(RedirectToLoginAction::class)->execute('auth.user-not-allowed');
        }

        // Try to find a socialite user
        $socialiteUser = $this->retrieveSocialiteUser($provider, $oauthUser);
        if ($socialiteUser instanceof SocialiteUser) {
            return $this->loginUser($socialiteUser);
        }

        // See if registration is allowed
        if (! app(IsRegistrationEnabledAction::class)->execute()) {
            RegistrationNotEnabled::dispatch($provider, $oauthUser);

            return app(RedirectToLoginAction::class)->execute('auth.registration-not-enabled');
        }

        // See if a user already exists, but not for this socialite provider
        // $user = app()->call($this->socialite->getUserResolver(), ['provider' => $provider, 'oauthUser' => $oauthUser, 'socialite' => $this->socialite]);
        $user = User::firstWhere(['email' => $oauthUser->getEmail()]);

        // Handle registration
        return $user
            ? $this->registerSocialiteUser($provider, $oauthUser, $user)
            : $this->registerOauthUser($provider, $oauthUser);
    }

    protected function retrieveOauthUser(string $provider): ?SocialiteUserContract
    {
        try {
            return Socialite::driver($provider)->user();
        } catch (InvalidStateException $e) {
            InvalidState::dispatch($e);
        }

        return null;
    }

    protected function retrieveSocialiteUser(string $provider, SocialiteUserContract $user): ?SocialiteUser
    {
        return SocialiteUser::query()
            ->where('provider', $provider)
            ->where('provider_id', $user->getId())
            ->first();
    }

    /**
     * @return RedirectResponse
     */
    protected function loginUser(SocialiteUser $socialiteUser)
    {
        $guard = app(GetGuardAction::class)->execute();
        Assert::boolean($remember_login = config('filament-socialite.remember_login', false));
        Assert::isInstanceOf($user = $socialiteUser->user, \Illuminate\Contracts\Auth\Authenticatable::class);

        // Log the user in
        $guard->login($user, $remember_login);

        // Dispatch the login event
        Login::dispatch($socialiteUser);

        $url = app(GetLoginRedirectRouteAction::class)->execute();

        // Redirect as intended
        return redirect()->intended(
            route($url)
        );
    }

    /**
     * @return RedirectResponse
     */
    protected function registerSocialiteUser(string $provider, SocialiteUserContract $oauthUser, UserContract $user)
    {
        // Create a socialite user
        // $socialiteUser = app()->call($this->socialite->getCreateSocialiteUserCallback(), ['provider' => $provider, 'oauthUser' => $oauthUser, 'user' => $user, 'socialite' => $this->socialite]);
        $socialiteUser = $this->createSocialiteUser(provider: $provider, oauthUser: $oauthUser, user: $user);

        // Dispatch the socialite user connected event
        SocialiteUserConnected::dispatch($socialiteUser);

        // Login the user
        return $this->loginUser($socialiteUser);
    }

    /**
     * @return RedirectResponse
     */
    protected function registerOauthUser(string $provider, SocialiteUserContract $oauthUser)
    {
        $socialiteUser = DB::transaction(function () use ($provider, $oauthUser) {
            // Create a user
            // $user = app()->call($this->socialite->getCreateUserCallback(), ['provider' => $provider, 'oauthUser' => $oauthUser, 'socialite' => $this->socialite]);
            $user = $this->createUser(oauthUser: $oauthUser);

            // Create a socialite user
            // return app()->call($this->socialite->getCreateSocialiteUserCallback(), ['provider' => $provider, 'oauthUser' => $oauthUser, 'user' => $user, 'socialite' => $this->socialite]);
            return $this->createSocialiteUser(provider: $provider, oauthUser: $oauthUser, user: $user);
        });

        // Dispatch the registered event
        Registered::dispatch($socialiteUser);

        // Login the user
        return $this->loginUser($socialiteUser);
    }
}
