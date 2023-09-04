<?php

declare(strict_types=1);

namespace Modules\User\Models;

// use Laravel\Passport\AccessToken as PassportAccessToken;
use Laravel\Passport\Token as PassportToken;

/**
 * Modules\User\Models\OauthAccessToken.
 *
 * @property string                                $id
 * @property int|null                              $user_id
 * @property int                                   $client_id
 * @property string|null                           $name
 * @property array|null                            $scopes
 * @property bool                                  $revoked
 * @property \Illuminate\Support\Carbon|null       $created_at
 * @property \Illuminate\Support\Carbon|null       $updated_at
 * @property \Illuminate\Support\Carbon|null       $expires_at
 * @property \Modules\User\Models\OauthClient|null $client
 * @property \Modules\User\Models\User|null        $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereScopes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereUserId($value)
 *
 * @mixin IdeHelperOauthAccessToken
 * @mixin \Eloquent
 */
class OauthAccessToken extends PassportToken
{
    /**
     * @var string
     */
    protected $connection = 'user';
    // protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];
}
