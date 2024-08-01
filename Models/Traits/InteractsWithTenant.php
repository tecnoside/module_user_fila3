<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Scopes\TenantScope;
use Modules\Xot\Datas\XotData;

/**
 * @property TeamContract $currentTeam
 */
trait InteractsWithTenant
{
    /**
     * The "booted" method of the model.
     */
    protected static function bootInteractsWithTenant(): void
    {
        static::addGlobalScope(new TenantScope());

        static::creating(
            static function ($model): void {
<<<<<<< HEAD
                $model->tenant_id = Filament::getTenant()->id;
=======
                $model->tenant_id = Filament::getTenant()?->getKey();
>>>>>>> 26fa8b7774be949d069b5f35f17df14fd2797de8
            }
        );
    }

    public function tenant(): BelongsTo
    {
        $class = XotData::make()->getTenantClass();

        return $this->belongsTo($class);
    }

    /**
     * Interact with the user's first name.
     */
    protected function setTenantIdAttribute(?int $value): void
    {
        if (null == $value) {
<<<<<<< HEAD
            $value = Filament::getTenant()->id;
=======
            $value = Filament::getTenant()?->getKey();
>>>>>>> 26fa8b7774be949d069b5f35f17df14fd2797de8
        }
        $this->attributes['tenant_id'] = $value;
    }
}
