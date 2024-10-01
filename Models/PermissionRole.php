<?php

declare(strict_types=1);

namespace Modules\User\Models;

/**
 * @property \Modules\Camping\Models\Profile|null $creator
 * @property \Modules\Camping\Models\Profile|null $updater
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole query()
 *
 * @mixin \Eloquent
 */
class PermissionRole extends BasePivot
{
}
