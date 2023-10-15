<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Traits\Uuids;

class Treatment extends Model
{
    use Uuids;

    protected $table = 'treatment';

    public $incrementing = false;
}
