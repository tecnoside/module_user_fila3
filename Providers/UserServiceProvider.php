<?php

declare(strict_types=1);

namespace Modules\User\Providers;

use Laravel\Passport\Passport;
use Modules\User\Models\OauthAccessToken;
use Modules\User\Models\OauthAuthCode;
use Modules\User\Models\OauthClient;
use Modules\User\Models\OauthPersonalAccessClient;
use Modules\User\Models\OauthRefreshToken;
use Modules\Xot\Providers\XotBaseServiceProvider;

class UserServiceProvider extends XotBaseServiceProvider
{
    public string $module_name = 'user';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public function bootCallback(): void
    {
        $this->registerPassport();
    }

    public function registerCallback(): void
    {
    }

    public function registerPassport(): void
    {
        Passport::usePersonalAccessClientModel(OauthPersonalAccessClient::class);
        Passport::useTokenModel(OauthAccessToken::class);
        Passport::useRefreshTokenModel(OauthRefreshToken::class);
        Passport::useAuthCodeModel(OauthAuthCode::class);
        Passport::useClientModel(OauthClient::class);
        if (method_exists(Passport::class, 'routes')) {
            Passport::routes();
        }
    }
}
