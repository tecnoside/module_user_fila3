<?php

declare(strict_types=1);

namespace Modules\User\Models;

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
