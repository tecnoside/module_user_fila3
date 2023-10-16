<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\User\Traits\Uuids;

class Treatment extends BaseModel
{
    use Uuids;

    // protected $table = 'treatment';

    public $incrementing = false;
}
