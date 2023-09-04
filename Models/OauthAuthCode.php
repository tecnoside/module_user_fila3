<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Laravel\Passport\AuthCode as PassportAuthCode;

/**
 * Modules\User\Models\OauthAuthCode.
 *
 * @property string                                $id
 * @property int                                   $user_id
 * @property int                                   $client_id
 * @property string|null                           $scopes
 * @property bool                                  $revoked
 * @property \Illuminate\Support\Carbon|null       $expires_at
 * @property \Modules\User\Models\OauthClient|null $client
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode whereScopes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode whereUserId($value)
 *
 * @mixin IdeHelperOauthAuthCode
 * @mixin \Eloquent
 */
class OauthAuthCode extends PassportAuthCode
{
    /**
     * @var string
     */
    protected $connection = 'user';
    // protected $fillable = ['id', 'user_id', 'client_id', 'scopes', 'revoked', 'expires_at'];
}
