<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Modules\User\Models\Permission.
 *
 * @property int                                                                      $id
 * @property string                                                                   $name
 * @property string                                                                   $guard_name
 * @property \Illuminate\Support\Carbon|null                                          $created_at
 * @property \Illuminate\Support\Carbon|null                                          $updated_at
 * @property \Illuminate\Database\Eloquent\Collection<int, Permission>                $permissions
 * @property int|null                                                                 $permissions_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Role> $roles
 * @property int|null                                                                 $roles_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\User> $users
 * @property int|null                                                                 $users_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 *
 * @property \Illuminate\Database\Eloquent\Collection<int, SpatiePermission>               $permissions
 * @property \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\User>      $users
 *
 * @mixin IdeHelperPermission
 * @mixin \Eloquent
 */
class Permission extends SpatiePermission
{
    /**
     * @var string
     */
    protected $connection = 'user';

    protected $fillable = ['id', 'name', 'guard_name', 'created_at', 'updated_at'];
}
