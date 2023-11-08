<?php

declare(strict_types=1);

namespace Modules\User\Models;

class DeviceUser extends BasePivot
{
<<<<<<< HEAD
=======
    /**
     * Undocumented variable.
     *
     * @var array
     */
>>>>>>> 818057d (up)
    protected $fillable = [
        'id',
        'device_id',
        'user_id',
        'login_at',
        'logout_at',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
<<<<<<< HEAD
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'login_at' => 'datetime',
        'logout_at' => 'datetime',
        'user_id' => 'string',
        'device_id' => 'string',
=======
        // 'id' => 'string',
        // 'locales' => 'array',
>>>>>>> 818057d (up)
    ];
}
