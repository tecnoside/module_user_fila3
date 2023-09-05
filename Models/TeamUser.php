<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
/**
 * Modules\User\Models\TeamUser.
 *
 * @property int                             $id
 * @property int                             $team_id
 * @property int                             $user_id
 * @property string|null                     $role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|TeamUser newModelQuery()
 * @method static Builder|TeamUser newQuery()
 * @method static Builder|TeamUser query()
 * @method static Builder|TeamUser whereCreatedAt($value)
 * @method static Builder|TeamUser whereId($value)
 * @method static Builder|TeamUser whereRole($value)
 * @method static Builder|TeamUser whereTeamId($value)
 * @method static Builder|TeamUser whereUpdatedAt($value)
 * @method static Builder|TeamUser whereUserId($value)
 *
 * @mixin IdeHelperTeamUser
 *
 * @property string|null $customer_id
 *
 * @method static Builder|TeamUser whereCustomerId($value)
 *
 * @mixin \Eloquent
 */
final class TeamUser extends BasePivot
{
    protected $connection = 'user';
}
