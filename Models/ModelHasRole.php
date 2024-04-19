<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\User\Database\Factories\ModelHasRoleFactory;

/**
 * Modules\User\Models\ModelHasRole.
 *
 * @property int $id
 * @property string $role_id
 * @property string $model_type
 * @property string $model_id
 * @property int|null $team_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static ModelHasRoleFactory factory($count = null, $state = [])
 * @method static Builder|ModelHasRole newModelQuery()
 * @method static Builder|ModelHasRole newQuery()
 * @method static Builder|ModelHasRole query()
 * @method static Builder|ModelHasRole whereCreatedAt($value)
 * @method static Builder|ModelHasRole whereCreatedBy($value)
 * @method static Builder|ModelHasRole whereId($value)
 * @method static Builder|ModelHasRole whereModelId($value)
 * @method static Builder|ModelHasRole whereModelType($value)
 * @method static Builder|ModelHasRole whereRoleId($value)
 * @method static Builder|ModelHasRole whereTeamId($value)
 * @method static Builder|ModelHasRole whereUpdatedAt($value)
 * @method static Builder|ModelHasRole whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class ModelHasRole extends BaseMorphPivot
{
    /** @var array<int, string> */
    protected $fillable = ['id', 'role_id', 'model_type', 'model_id', 'team_id'];

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',

            //    'id' => 'string',
        ];
    }
}
