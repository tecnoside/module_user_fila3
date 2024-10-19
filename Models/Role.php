<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * Modules\User\Models\Role.
 *
 * @property string                                                                    $uuid
 * @property string|null                                                               $team_id
 * @property string                                                                    $name
 * @property string                                                                    $guard_name
 * @property Carbon|null                                                               $created_at
 * @property Carbon|null                                                               $updated_at
 * @property Collection<int, \Modules\User\Models\Permission>                          $permissions
 * @property int|null                                                                  $permissions_count
 * @property Team|null                                                                 $team
 * @property EloquentCollection<int, \Illuminate\Database\Eloquent\Model&UserContract> $users
 * @property int|null                                                                  $users_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUuid($value)
 *
 * @property int $id
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 *
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedBy($value)
 *
 * @mixin Eloquent
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Role withoutPermission($permissions)
 *
 * @mixin \Eloquent
 */
class Role extends SpatieRole
{
    use HasFactory;

    // use HasUuids;

    final public const ROLE_ADMINISTRATOR = 1;

    final public const ROLE_OWNER = 2;

    final public const ROLE_USER = 3;

    /** @var string */
    protected $connection = 'user';

    // protected $fillable=['id','']

    /**
     * Get all of the teams the user belongs to.
     */
    public function team(): BelongsTo
    {
        $xotData = XotData::make();
        /** @var class-string<Model> */
        $teamClass = $xotData->getTeamClass();

        return $this->belongsTo($teamClass);
        /*
        $pivotClass = $xot->getMembershipClass();
        $pivot = app($pivotClass);
        $pivotTable = $pivot->getTable();
        $pivotDbName = $pivot->getConnection()->getDatabaseName();
        $pivotTableFull = $pivotDbName.'.'.$pivotTable;

        // $this->setConnection('mysql');
        return $this->belongsToMany($xot->getTeamClass(), $pivotTableFull, null, 'team_id')
            ->using($pivotClass)
            ->withPivot('role')
            ->withTimestamps()
            ->as('membership');
        */
    }
}