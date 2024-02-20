<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\Models\User;
use Modules\Xot\Datas\XotData;

trait IsProfileTrait
{
    // --- RELATIONS

    /**
     * Undocumented function.
     */
    public function user(): BelongsTo
    {
        // $user = TenantService::model('user'); //no bisgna guardare dentro config(auth  etc etc
        // $user_class = \get_class($user);
        $userClass = XotData::make()->getUserClass();

        return $this->belongsTo($userClass);
    }

    // ---- mutators
    public function getFullNameAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        $res = $this->first_name.' '.$this->last_name;
        if (strlen($res) > 2) {
            return $res;
        }

        return $this->user?->name;
    }

    public function getFirstNameAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }
        $value = $this->user?->first_name;
        $this->update(['first_name' => $value]);

        return $value;
    }

    public function getLastNameAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }
        $value = $this->user?->last_name;
        $this->update(['last_name' => $value]);

        return $value;
    }

    public function isSuperAdmin(): bool
    {
        if ($this->user == null) {
            return false;
        }

        return $this->user->hasRole('super-admin');
    }
}
