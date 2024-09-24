<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\UserContract;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission.
 *
 * Extends Spatie's Permission model to interact with the permission system.
 *
 * @property int                                                                       $id
 * @property string                                                                    $name
 * @property string                                                                    $guard_name
 * @property Carbon|null                                                               $created_at
 * @property Carbon|null                                                               $updated_at
 * @property string|null                                                               $created_by
 * @property string|null                                                               $updated_by
 * @property Collection<int, Role>                                                     $roles
 * @property int|null                                                                  $roles_count
 * @property EloquentCollection<int, \Illuminate\Database\Eloquent\Model&UserContract> $users
 * @property int|null                                                                  $users_count
 *
 * @method static Builder|Permission newModelQuery()
 * @method static Builder|Permission newQuery()
 * @method static Builder|Permission query()
 * @method static Builder|Permission whereCreatedAt($value)
 * @method static Builder|Permission whereUpdatedAt($value)
 * @method static Builder|Permission whereCreatedBy($value)
 * @method static Builder|Permission whereUpdatedBy($value)
 * @method static Builder|Permission whereGuardName($value)
 * @method static Builder|Permission whereId($value)
 * @method static Builder|Permission whereName($value)
 * @method static Builder|Permission role($roles, $guard = null)
 * @method static Builder|Permission permission($permissions)
 *
 * @mixin \Eloquent
 */
class Permission extends SpatiePermission
{
    /** @var string */
    protected $connection = 'user';

    /** @var list<string> */
    protected $fillable = [
        'id',
        'name',
        'guard_name',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];

    /** @var array<string, string> */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The roles associated with the permission.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * The users associated with the permission.
     */
    public function users(): BelongsToMany
    {
        $userClass = \Modules\Xot\Datas\XotData::make()->getUserClass();

        return $this->belongsToMany($userClass);
    }
}
