<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\Models\User;

trait IsProfileTrait
{
    // --- RELATIONS
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ---- mutators
    public function getFullNameAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }

        $res = $this->first_name.' '.$this->last_name;
        if (strlen($res) > 2) {
            return $res;
        }

        return $this->user->name;
    }

    public function getFirstNameAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }
        $value = $this->user->first_name;
        $this->update(['first_name' => $value]);

        return $value;
    }

    public function getLastNameAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }
        $value = $this->user->last_name;
        $this->update(['last_name' => $value]);

        return $value;
    }
}
