<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Filament\Panel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Datas\XotData;

// use Modules\User\Models\OwnerRole;

/**
 * Undocumented trait.
 *
 * @property TeamContract $currentTeam
 */
trait HasTenants
{
    // public function teams(): BelongsToMany
    // {
    //    return $this->belongsToMany(Team::class);
    // }

    public function canAccessTenant(Model $tenant): bool
    {
        // return $this->teams->contains($tenant);
        return true;
    }

    public function getTenants(Panel $panel): array|Collection
    {
        return $this->tenants;
    }

    /**
     * Get all of the teams the user belongs to.
     */
    public function tenants(): BelongsToMany
    {
        $xot = XotData::make();
        $pivotClass = $xot->getTenantPivotClass();
        $pivot = app($pivotClass);
        $pivotTable = $pivot->getTable();
        $pivotDbName = $pivot->getConnection()->getDatabaseName();
        $pivotTableFull = $pivotDbName.'.'.$pivotTable;
        $pivotFields = $pivot->getFillable();

        // $this->setConnection('mysql');
        return $this->belongsToMany($xot->getTenantClass(), $pivotTableFull, null, 'tenant_id')
            ->using($pivotClass)
            ->withPivot($pivotFields)
            ->withTimestamps();
        // ->as('membership')
    }
}
