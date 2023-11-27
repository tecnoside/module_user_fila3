<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Laravel\Passport\AuthCode as PassportAuthCode;

/**
 * Modules\User\Models\OauthAuthCode.
 *
 * @property-read \Modules\User\Models\OauthClient|null $client
 * @method static Builder|OauthAuthCode newModelQuery()
 * @method static Builder|OauthAuthCode newQuery()
 * @method static Builder|OauthAuthCode query()
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
