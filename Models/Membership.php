<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * Modules\User\Models\Membership.
 *
 * @property string $role
 *
 * @method static Builder|Membership newModelQuery()
 * @method static Builder|Membership newQuery()
 * @method static Builder|Membership query()
 *
 * @property int         $id
 * @property string      $uuid
 * @property string|null $team_id
 * @property string|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $customer_id
 *
 * @method static Builder|Membership whereCreatedAt($value)
 * @method static Builder|Membership whereCreatedBy($value)
 * @method static Builder|Membership whereCustomerId($value)
 * @method static Builder|Membership whereId($value)
 * @method static Builder|Membership whereRole($value)
 * @method static Builder|Membership whereTeamId($value)
 * @method static Builder|Membership whereUpdatedAt($value)
 * @method static Builder|Membership whereUpdatedBy($value)
 * @method static Builder|Membership whereUserId($value)
 * @method static Builder|Membership whereUuid($value)
 *
 * @mixin \Eloquent
 */
class Membership extends BasePivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     */
    /**
     * @var bool
     */
    public $incrementing = true;
<<<<<<< HEAD
=======

    /**
     * @var string
     */
    protected $connection = 'user';
>>>>>>> 9265a1b6892b4aca6d1b66e51335bf40ddf5f6fb

    /**
     * @var string
     */
<<<<<<< HEAD
    protected $connection = 'user';

    /**
     * The table associated with the model.
     *
=======
    /**
>>>>>>> 9265a1b6892b4aca6d1b66e51335bf40ddf5f6fb
     * @var string
     */
    protected $table = 'team_user';
}
