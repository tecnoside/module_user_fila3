<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

/**
 * @method static \Modules\User\Database\Factories\TenantFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant   query()
 *
 * @property \Illuminate\Database\Eloquent\Collection<int, Model&UserContract> $members
 * @property int|null                                    $members_count
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 * @phpstan-require-extends Model
 */
interface TenantContract extends ModelContract
{
    // belongstomany or hasmany ?
    // public function users(): HasMany;
}
