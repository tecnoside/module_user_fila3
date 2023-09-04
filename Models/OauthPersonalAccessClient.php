<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Laravel\Passport\PersonalAccessClient as PassportPersonalAccessClient;

/**
 * Modules\User\Models\OauthPersonalAccessClient.
 *
 * @property int                                   $id
 * @property int                                   $client_id
 * @property \Illuminate\Support\Carbon|null       $created_at
 * @property \Illuminate\Support\Carbon|null       $updated_at
 * @property \Modules\User\Models\OauthClient|null $client
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient query()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereUpdatedAt($value)
 *
 * @mixin IdeHelperOauthPersonalAccessClient
 * @mixin \Eloquent
 */
class OauthPersonalAccessClient extends PassportPersonalAccessClient
{
    /**
     * @var string
     */
    protected $connection = 'user';
    // protected $fillable = ['id', 'client_id'];
}
