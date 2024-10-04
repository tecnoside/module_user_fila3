<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Support\Carbon;

/**
 * Modules\User\Models\Membership.
 *
 * @property string $role
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership query()
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
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUuid($value)
 *
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereDeletedBy($value)
 *
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @mixin \Eloquent
 */
class Membership extends BasePivot
{
    /** @var bool */
    public $incrementing = true;

    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'team_user';
}
