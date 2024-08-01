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
        $builder->where('tenant_id', '=', Filament::getTenant()->id);
=======
        $tenant_id = Filament::getTenant()?->getKey();
        if (null !== $tenant_id) {
            $builder->where('tenant_id', '=', $tenant_id);
        }
>>>>>>> 26fa8b7774be949d069b5f35f17df14fd2797de8
    }
}
