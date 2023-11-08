<?php

declare(strict_types=1);

namespace Modules\User\Models;

class Device extends BaseModel
{
<<<<<<< HEAD
    protected $fillable = [
        'id',
        'mobile_id',
        'device',
        'platform',
        'browser',
        'version',
=======
    /**
     * Undocumented variable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'languages', // ['en-us', 'en'] ;
        'device', // "Macintosh"
        'platform', // "OS X"
        'browser', // "Safari"
        'version', // $agent->version($browser)
        'is_robot', // bool
        'robot', // the robot name
>>>>>>> 818057d (up)
        'is_desktop',
        'is_mobile',
        'is_tablet',
        'is_phone',
<<<<<<< HEAD
        'is_robot',
        'robot',
=======
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        // 'id' => 'string',
        'locales' => 'array',
>>>>>>> 818057d (up)
    ];
}
