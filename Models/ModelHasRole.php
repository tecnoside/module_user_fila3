<?php

declare(strict_types=1);

namespace Modules\User\Models;

/**
 * Modules\User\Models\ModelHasRole.
 *
 * @mixin IdeHelperModelHasRole
 *
 * @property int    $role_id
 * @property string $model_type
 * @property int    $model_id
 *
 * @method static \Modules\User\Database\Factories\ModelHasRoleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole   query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole   whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole   whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole   whereRoleId($value)
 *
 * @mixin \Eloquent
 */
class ModelHasRole extends BaseMorphPivot
{
    /**
     * @var array<string>
     *
     * @psalm-var list{'role_id', 'model_type', 'model_id'}
     */
    protected $fillable = ['role_id', 'model_type', 'model_id', 'team_id'];
}
