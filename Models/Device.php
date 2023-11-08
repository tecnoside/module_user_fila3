<?php

declare(strict_types=1);

namespace Modules\User\Models;

class Device extends BaseModel
{
    /**
     * Undocumented variable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'mobile_id', // mattia
        'languages', // ['en-us', 'en'] ;
        'device', // "Macintosh"
        'platform', // "OS X"
        'browser', // "Safari"
        'version', // $agent->version($browser)
        'is_robot', // bool
        'robot', // the robot name
        'is_desktop',
        'is_mobile',
        'is_tablet',
        'is_phone',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        // 'id' => 'string',
        // 'locales' => 'array',
        'languages' => 'array',
    ];
}
