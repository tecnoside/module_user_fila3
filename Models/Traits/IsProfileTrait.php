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
        if ($value !== null) {
            return $value;
        }

        return $this->first_name.' '.$this->last_name;
    }
}
