<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Contracts\TeamContract;

use Modules\Xot\Datas\XotData;

// use Modules\User\Models\OwnerRole;

/**
 * Undocumented trait.
 *
 * @property TeamContract $currentTeam
 */
trait IsTenants
{
    public function users(): BelongsToMany
    {
        $xot = XotData::make();
        $pivotClass = $xot->getTenantPivotClass();
        $pivot = app($pivotClass);
        $pivotTable = $pivot->getTable();
        $pivotDbName = $pivot->getConnection()->getDatabaseName();
        $pivotTableFull = $pivotDbName.'.'.$pivotTable;
        $pivotFields = $pivot->getFillable();

        // $this->setConnection('mysql');
        return $this->belongsToMany(\Modules\Xot\Datas\XotData::make()->getUserClass(), $pivotTableFull, 'tenant_id', 'user_id')
            ->using($pivotClass)
            ->withPivot($pivotFields)
            ->withTimestamps();
        // ->as('membership')
    }
}
