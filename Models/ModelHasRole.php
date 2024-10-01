<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Support\Carbon;
use Modules\User\Database\Factories\ModelHasRoleFactory;

/**
 * Modules\User\Models\ModelHasRole.
 *
 * @property int         $id
 * @property string      $role_id
 * @property string      $model_type
 * @property string      $model_id
 * @property int|null    $team_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static ModelHasRoleFactory                                factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereUpdatedBy($value)
 * @property string $uuid (DC2Type:guid)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereUuid($value)
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 * @mixin \Eloquent
 */
class ModelHasRole extends BaseMorphPivot
{
    /** @var list<string> */
    protected $fillable = ['id', 'role_id', 'model_type', 'model_id', 'team_id'];

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',

            //    'id' => 'string',
        ];
    }
}
