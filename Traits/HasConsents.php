<?php

declare(strict_types=1);

namespace Modules\User\Traits;

use Modules\User\Models\Consent;

trait HasConsents
{
    public function consents()
    {
        return $this->hasMany(Consent::class, 'subject_id');
    }
}
