<?php

declare(strict_types=1);

namespace Modules\User\Models;

/**
 * Modules\User\Models\ModelHasPermission.
 *
 * @mixin IdeHelperModelHasPermission
 *
 * @method static \Modules\User\Database\Factories\ModelHasPermissionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission   query()
 *
 * @mixin \Eloquent
 */
class ModelHasPermission extends BaseMorphPivot
{
    /**
     * @var array<string>
     *
     * @psalm-var list{'permission_id', 'model_type', 'model_id'}
     */
    protected $fillable = ['permission_id', 'model_type', 'model_id'];
}
