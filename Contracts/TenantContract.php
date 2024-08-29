<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @phpstan-require-extends Model
 */
interface TenantContract extends ModelContract
{
    // belongstomany or hasmany ?
    // public function users(): HasMany;
}
