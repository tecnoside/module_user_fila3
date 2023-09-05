<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\User\Database\Factories\ModelHasPermissionFactory;
use Illuminate\Database\Eloquent\Builder;
/**
 * Modules\User\Models\ModelHasPermission.
 *
 * @mixin IdeHelperModelHasPermission
 *
 * @method static ModelHasPermissionFactory factory($count = null, $state = [])
 * @method static Builder|ModelHasPermission newModelQuery()
 * @method static Builder|ModelHasPermission newQuery()
 * @method static Builder|ModelHasPermission query()
 *
 * @mixin \Eloquent
 */
final class ModelHasPermission extends BaseMorphPivot
{
    /**
     * @var array<string>
     *
     * @psalm-var list{'permission_id', 'model_type', 'model_id'}
     */
    protected $fillable = ['permission_id', 'model_type', 'model_id'];
}
