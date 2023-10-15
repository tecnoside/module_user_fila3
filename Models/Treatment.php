<?php 

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\User\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model {

    use Uuids;

    protected $table = 'treatment';

    public $incrementing = false;
}