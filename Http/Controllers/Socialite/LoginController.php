<?php

declare(strict_types=1);

namespace Modules\User\Http\Controllers\Socialite;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
use Modules\User\Actions\Socialite\GetDomainAllowListAction;
use Modules\User\Actions\Socialite\GetGuardAction;
use Modules\User\Actions\Socialite\GetProviderScopesAction;
use Modules\User\Actions\Socialite\IsProviderConfiguredAction;
use Modules\User\Actions\Socialite\IsRegistrationEnabledAction;
use Modules\User\Events;
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

    protected function retrieveOauthUser(string $provider): ?SocialiteUserContract
    {
        try {
            return Socialite::driver($provider)->user();
        } catch (InvalidStateException $e) {
            Events\InvalidState::dispatch($e);
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
        return redirect()->route(config('filament-socialite.login_page_route', 'filament.auth.login'))
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
        if (\count($domains) < 1) {
            return true;
        }

        // Get the domain of the email for the specified user
        $emailDomain = Str::of($user->getEmail())
            ->afterLast('@')
            ->lower()
            ->__toString();

        // See if everything after @ is in the domains array
        if (\in_array($emailDomain, $domains, true)) {
            return true;
        }

        return false;
    }

    protected function loginUser(SocialiteUser $socialiteUser)
    {
        $guard = app(GetGuardAction::class)->execute();
        // Log the user in
        $guard->login($socialiteUser->user, config('filament-socialite.remember_login', false));

        // Dispatch the login event
        Events\Login::dispatch($socialiteUser);

        $url = app(GetLoginRedirectRouteAction::class)->execute();
        // Redirect as intended
        return redirect()->intended(
            route($url)
        );
    }

    protected function registerSocialiteUser(string $provider, SocialiteUserContract $oauthUser, Model $user)
    {
        // Create a socialite user
        // $socialiteUser = app()->call($this->socialite->getCreateSocialiteUserCallback(), ['provider' => $provider, 'oauthUser' => $oauthUser, 'user' => $user, 'socialite' => $this->socialite]);
        $socialiteUser = $this->createSocialiteUser(provider: $provider, oauthUser: $oauthUser, user: $user);

        // Dispatch the socialite user connected event
        Events\SocialiteUserConnected::dispatch($socialiteUser);

        // Login the user
        return $this->loginUser($socialiteUser);
    }

    public function createSocialiteUser(string $provider, SocialiteUserContract $oauthUser, Model $user)
    {
        $socialiteUser = SocialiteUser::create([
            'user_id' => $user->getKey(),
            'provider' => $provider,
            'provider_id' => $oauthUser->getId(),
        ]);

        return $socialiteUser;
    }

    public function createUser(SocialiteUserContract $oauthUser)
    {
        $xot = XotData::make();
        $userClass = $xot->getUserClass();
        $user = $userClass::create(
            [
                'name' => $oauthUser->getName(),
                'email' => $oauthUser->getEmail(),
            ]
        );

        return $user;
    }

    protected function registerOauthUser(string $provider, SocialiteUserContract $oauthUser)
    {
        $socialiteUser = DB::transaction(function () use ($provider, $oauthUser) {
            // Create a user
            // $user = app()->call($this->socialite->getCreateUserCallback(), ['provider' => $provider, 'oauthUser' => $oauthUser, 'socialite' => $this->socialite]);
            $user = $this->createUser(oauthUser: $oauthUser);
            // Create a socialite user
            // return app()->call($this->socialite->getCreateSocialiteUserCallback(), ['provider' => $provider, 'oauthUser' => $oauthUser, 'user' => $user, 'socialite' => $this->socialite]);
            $socialiteUser = $this->createSocialiteUser(provider: $provider, oauthUser: $oauthUser, user: $user);

            return $socialiteUser;
        });

        // Dispatch the registered event
        Events\Registered::dispatch($socialiteUser);

        // Login the user
        return $this->loginUser($socialiteUser);
    }

    public function processCallback(string $provider)
    {
        dddx($provider);
        // See if provider exists
        if (! app(IsProviderConfiguredAction::class)->execute($provider)) {
            throw ProviderNotConfigured::make($provider);
        }

        // Try to retrieve existing user
        $oauthUser = $this->retrieveOauthUser($provider);
        if (null === $oauthUser) {
            return $this->redirectToLogin('auth.login-failed');
        }

        // Verify if user is allowed
        if (! $this->isUserAllowed($oauthUser)) {
            Events\UserNotAllowed::dispatch($oauthUser);

            return $this->redirectToLogin('auth.user-not-allowed');
        }

        // Try to find a socialite user
        $socialiteUser = $this->retrieveSocialiteUser($provider, $oauthUser);
        if ($socialiteUser) {
            return $this->loginUser($socialiteUser);
        }

        // See if registration is allowed
        if (! app(IsRegistrationEnabledAction::class)->execute()) {
            Events\RegistrationNotEnabled::dispatch($provider, $oauthUser);

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
}
