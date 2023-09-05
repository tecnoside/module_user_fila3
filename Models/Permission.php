<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Modules\User\Models\Permission.
 *
 * @property int                                                                      $id
 * @property string                                                                   $name
 * @property string                                                                   $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection<int, Permission> $permissions
 * @property int|null                                                                 $permissions_count
 * @property Collection<int, Role> $roles
 * @property int|null                                                                 $roles_count
 * @property Collection<int, User> $users
 * @property int|null                                                                 $users_count
 *
 * @method static Builder|Permission newModelQuery()
 * @method static Builder|Permission newQuery()
 * @method static Builder|Permission permission($permissions)
 * @method static Builder|Permission query()
 * @method static Builder|Permission role($roles, $guard = null)
 * @method static Builder|Permission whereCreatedAt($value)
 * @method static Builder|Permission whereGuardName($value)
 * @method static Builder|Permission whereId($value)
 * @method static Builder|Permission whereName($value)
 * @method static Builder|Permission whereUpdatedAt($value)
 *
 * @property Collection<int, SpatiePermission> $permissions
 * @property Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property Collection<int, User> $users
 *
 * @mixin IdeHelperPermission
 * @mixin \Eloquent
 */
final class Permission extends SpatiePermission
{
    /**
     * @var string
     */
    protected $connection = 'user';

    protected $fillable = ['id', 'name', 'guard_name', 'created_at', 'updated_at'];
}
