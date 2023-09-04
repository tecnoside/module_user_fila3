<?php

declare(strict_types=1);

namespace Modules\User\Models;

/**
 * Modules\User\Models\TeamUser.
 *
 * @property int                             $id
 * @property int                             $team_id
 * @property int                             $user_id
 * @property string|null                     $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TeamUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamUser whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamUser whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamUser whereUserId($value)
 *
 * @mixin IdeHelperTeamUser
 *
 * @property string|null $customer_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TeamUser whereCustomerId($value)
 *
 * @mixin \Eloquent
 */
class TeamUser extends BasePivot
{
    protected $connection = 'user';
}
