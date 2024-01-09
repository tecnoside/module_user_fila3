<?php

declare(strict_types=1);

namespace Modules\User\Models;

// use Laravel\Passport\AccessToken as PassportAccessToken;
use Laravel\Passport\Token as PassportToken;

class OauthAccessToken extends PassportToken
{
    /**
     * @var string
     */
    protected $connection = 'user';

    // protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];
}
