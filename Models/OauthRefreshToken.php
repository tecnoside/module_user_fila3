<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Laravel\Passport\RefreshToken as PassportRefreshToken;

/**
 * Modules\User\Models\OauthRefreshToken.
 *
 * @property-read \Modules\User\Models\OauthAccessToken|null $accessToken
 * @method static Builder|OauthRefreshToken newModelQuery()
 * @method static Builder|OauthRefreshToken newQuery()
 * @method static Builder|OauthRefreshToken query()
 * @mixin \Eloquent
 */
class OauthRefreshToken extends PassportRefreshToken
{
    /*
     * @var string
     */
    protected $connection = 'user';

    // protected $fillable = ['id', 'access_token_id', 'revoked', 'expires_at'];
}
