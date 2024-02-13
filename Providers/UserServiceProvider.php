<?php

/**
 * ----.
 */

declare(strict_types=1);

namespace Modules\User\Providers;

use Laravel\Passport\Passport;
use Modules\User\Console\Commands\AssignModuleCommand;
use Modules\User\Console\Commands\AssignRoleCommand;
use Modules\User\Console\Commands\AssignTeamCommand;
use Modules\User\Console\Commands\RemoveRoleCommand;
use Modules\User\Console\Commands\SuperAdminCommand;
use Modules\User\Models\OauthAccessToken;
use Modules\User\Models\OauthAuthCode;
use Modules\User\Models\OauthClient;
use Modules\User\Models\OauthPersonalAccessClient;
use Modules\User\Models\OauthRefreshToken;
use Modules\Xot\Providers\XotBaseServiceProvider;
use SocialiteProviders\Manager\ServiceProvider;

class UserServiceProvider extends XotBaseServiceProvider
{
    public string $module_name = 'user';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public function bootCallback(): void
    {
        $this->registerAuthenticationProviders();
        $this->registerEventListener();
        $this->commands(
            [
                AssignModuleCommand::class,
                AssignRoleCommand::class,
                RemoveRoleCommand::class,
                AssignTeamCommand::class,
                SuperAdminCommand::class,
            ]
        );
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
                'core-technicians' => 'the tecnicians can ',
            ]
        );
    }

    private function registerSocialite(): void
    {
        $this->app->register(ServiceProvider::class);
    }
}
