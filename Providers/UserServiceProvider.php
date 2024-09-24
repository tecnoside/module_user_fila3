<?php

/**
 * ----.
 */

declare(strict_types=1);

namespace Modules\User\Providers;

use Illuminate\Validation\Rules\Password;
use Laravel\Passport\Passport;
use Modules\User\Models\OauthAccessToken;
use Modules\User\Models\OauthAuthCode;
use Modules\User\Models\OauthClient;
use Modules\User\Models\OauthPersonalAccessClient;
use Modules\User\Models\OauthRefreshToken;
use Modules\Xot\Providers\XotBaseServiceProvider;
use SocialiteProviders\Manager\ServiceProvider as SocialiteServiceProvider;

class UserServiceProvider extends XotBaseServiceProvider
{
    public string $module_name = 'user';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public function bootCallback(): void
    {
        $this->registerAuthenticationProviders();
        $this->registerEventListener();
        $this->registerPasswordRules();
    }

    public function registerPasswordRules(): void
    {
        Password::defaults(function () {
            return Password::min(8)
                           ->mixedCase()
                           ->uncompromised();
        });
        // $request->validate([
        //     'password' => ['required', Password::defaults()],
        // ]);
    }

    protected function registerAuthenticationProviders(): void
    {
        $this->registerPassport();
        $this->registerSocialite();
    }

    protected function registerEventListener(): void
    {
        $this->app->register(EventServiceProvider::class);
    }

    private function registerSocialite(): void
    {
        $this->app->register(SocialiteServiceProvider::class);
    }

    private function registerPassport(): void
    {
        Passport::usePersonalAccessClientModel(OauthPersonalAccessClient::class);
        Passport::useTokenModel(OauthAccessToken::class);
        Passport::useRefreshTokenModel(OauthRefreshToken::class);
        Passport::useAuthCodeModel(OauthAuthCode::class);
        Passport::useClientModel(OauthClient::class);
        if (method_exists(Passport::class, 'routes')) {
            Passport::routes();
        }

        Passport::tokensExpireIn(now()->addDays(1));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
        Passport::tokensCan(
            [
                'view-user' => 'View user information',
                'core-technicians' => 'the technicians can ',
            ]
        );
    }
}
