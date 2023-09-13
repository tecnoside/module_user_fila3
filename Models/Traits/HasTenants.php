<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Support\Str;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\Xot\Datas\XotData;
use Illuminate\Support\Collection;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Contracts\TeamContract;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Filament\Panel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// use Modules\User\Models\OwnerRole;

/**
 * Undocumented trait.
 *
 * @property TeamContract $currentTeam
 */
trait HasTenants
{
//public function teams(): BelongsToMany
    //{
    //    return $this->belongsToMany(Team::class);
    //}

    public function canAccessTenant(Model $tenant): bool
    {
        //return $this->teams->contains($tenant);
        return true;
    }

    public function getTenants(Panel $panel): array|Collection
    {
        return $this->teams;
    }
}