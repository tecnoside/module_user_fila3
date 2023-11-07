<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

class Device extends BaseModel
{
    protected $fillable = [
        'id',
        'mobile_id',
        'device',
        'platform',
        'browser',
        'version',
        'is_desktop',
        'is_mobile',
        'is_tablet',
        'is_phone',
        'is_robot',
        'robot',
    ];

   
}
