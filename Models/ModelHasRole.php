<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\User\Database\Factories\ModelHasRoleFactory;

/**
 * Modules\User\Models\ModelHasRole.
 *
 * @mixin IdeHelperModelHasRole
 *
 * @property int    $role_id
 * @property string $model_type
 * @property int    $model_id
 *
 * @method static ModelHasRoleFactory  factory($count = null, $state = [])
 * @method static Builder|ModelHasRole newModelQuery()
 * @method static Builder|ModelHasRole newQuery()
 * @method static Builder|ModelHasRole query()
 * @method static Builder|ModelHasRole whereModelId($value)
 * @method static Builder|ModelHasRole whereModelType($value)
 * @method static Builder|ModelHasRole whereRoleId($value)
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
