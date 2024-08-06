<?php

declare(strict_types=1);

namespace Modules\User\Models\Scopes;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
<<<<<<< HEAD
        $tenant_id = Filament::getTenant()?->getKey();
        if (null !== $tenant_id) {
            $builder->where('tenant_id', '=', $tenant_id);
        }
=======
        $builder->where('tenant_id', '=', Filament::getTenant()->id);
>>>>>>> d02a3da (✨ (TenantScope.php): Add new TenantScope class to apply scope to Eloquent query builder based on tenant_id)
    }
}
