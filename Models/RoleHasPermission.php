<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\User\Models\RoleHasPermission.
 *
 * @property int $permission_id
 * @property int $role_id
 *
 * @method static \Modules\LU\Database\Factories\RoleHasPermissionFactory factory($count = null, $state = [])
 * @method static Builder|RoleHasPermission                               newModelQuery()
 * @method static Builder|RoleHasPermission                               newQuery()
 * @method static Builder|RoleHasPermission                               query()
 * @method static Builder|RoleHasPermission                               wherePermissionId($value)
 * @method static Builder|RoleHasPermission                               whereRoleId($value)
 *
 * @mixin IdeHelperRoleHasPermission
 * @mixin \Eloquent
 */
class RoleHasPermission extends BasePivot
{
    /**
     * @var array<string>
     *
     * @psalm-var list{'permission_id', 'role_id'}
     */
    protected $fillable = ['permission_id', 'role_id'];
}
