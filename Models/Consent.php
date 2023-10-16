<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\User\Traits\Uuids;

class Consent extends BaseModel
{
    use Uuids;

    // protected $table = 'consent';

    public $incrementing = false;

    public $fillable = ['subject_id', 'treatment_id'];

    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }
}
