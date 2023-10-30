<?php

declare(strict_types=1);

namespace Modules\User\Http\Controllers\Socialite;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Modules\User\Actions\Socialite\GetDomainAllowListAction;
use Modules\User\Actions\Socialite\GetGuardAction;
use Modules\User\Actions\Socialite\GetLoginRedirectRouteAction;
use Modules\User\Actions\Socialite\GetProviderScopesAction;
use Modules\User\Actions\Socialite\IsProviderConfiguredAction;
use Modules\User\Actions\Socialite\IsRegistrationEnabledAction;
use Modules\User\Events\InvalidState;
use Modules\User\Events\Login;
use Modules\User\Events\Registered;
use Modules\User\Events\RegistrationNotEnabled;
use Modules\User\Events\SocialiteUserConnected;
use Modules\User\Events\UserNotAllowed;
use Modules\User\Exceptions\ProviderNotConfigured;
use Modules\User\Models\SocialiteUser;
use Modules\User\Models\User;
use Modules\Xot\Datas\XotData;

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

        return Socialite::with($provider)
            ->scopes($scopes)
            ->redirect();
    }

    /**
     * @return SocialiteUser
     */
    public function createSocialiteUser(string $provider, SocialiteUserContract $oauthUser, Model $user)
    {
        return SocialiteUser::create([
            'user_id' => $user->getKey(),
            'provider' => $provider,
            'provider_id' => $oauthUser->getId(),
        ]);
    }

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
            return $this->redirectToLogin('auth.login-failed');
        }

        // Verify if user is allowed
        if (! $this->isUserAllowed($oauthUser)) {
            UserNotAllowed::dispatch($oauthUser);

            return $this->redirectToLogin('auth.user-not-allowed');
        }

        // Try to find a socialite user
        $socialiteUser = $this->retrieveSocialiteUser($provider, $oauthUser);
        if ($socialiteUser instanceof SocialiteUser) {
            return $this->loginUser($socialiteUser);
        }

        // See if registration is allowed
        if (! app(IsRegistrationEnabledAction::class)->execute()) {
            RegistrationNotEnabled::dispatch($provider, $oauthUser);

            return $this->redirectToLogin('auth.registration-not-enabled');
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

    protected function redirectToLogin(string $message): RedirectResponse
    {
        // Redirect back to the login route with an error message attached
        return to_route(config('filament-socialite.login_page_route', 'filament.auth.login'))
            ->withErrors([
                'email' => [
                    __($message),
                ],
            ]);
    }

    protected function isUserAllowed(SocialiteUserContract $user): bool
    {
        $domains = app(GetDomainAllowListAction::class)->execute();

        // When no domains are specified, all users are allowed
        if ((is_countable($domains) ? \count($domains) : 0) < 1) {
            return true;
        }

        // Get the domain of the email for the specified user
        $emailDomain = Str::of($user->getEmail())
            ->afterLast('@')
            ->lower()
            ->__toString();

        // See if everything after @ is in the domains array
        return \in_array($emailDomain, $domains, true);
    }

    /**
     * @return RedirectResponse
     */
    protected function loginUser(SocialiteUser $socialiteUser)
    {
        $guard = app(GetGuardAction::class)->execute();
        // Log the user in
        $guard->login($socialiteUser->user, config('filament-socialite.remember_login', false));

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
    protected function registerSocialiteUser(string $provider, SocialiteUserContract $oauthUser, Model $user)
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
