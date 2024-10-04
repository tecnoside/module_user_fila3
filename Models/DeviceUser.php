<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

/**
 * Modules\User\Models\DeviceUser.
 *
 * @property Device|null $device
 *
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceUser query()
 *
 * @property int         $id
 * @property string      $device_id
 * @property string      $user_id
 * @property Carbon|null $login_at
 * @property Carbon|null $logout_at
 * @property string|null $push_notifications_token
 * @property bool|null   $push_notifications_enabled
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceUser whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceUser whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceUser whereLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceUser whereLogoutAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceUser wherePushNotificationsEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceUser wherePushNotificationsToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceUser whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceUser whereUserId($value)
 *
 * @property ProfileContract|null $profile
 * @property UserContract|null    $user
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @mixin \Eloquent
 */
class DeviceUser extends BasePivot
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'device_id',
        'user_id',
        'login_at',
        'logout_at',
        'push_notifications_token',
        'push_notifications_enabled',
    ];

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',

            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'login_at' => 'datetime',
            'logout_at' => 'datetime',
            'user_id' => 'string',
            'device_id' => 'string',
            // 'id' => 'string',
            // 'locales' => 'array',
            'push_notifications_token' => 'string',
            'push_notifications_enabled' => 'boolean',
        ];
    }

    /**
     * old_return BelongsTo<Device, DeviceUser>.
     */
    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }

    /**
     * old_return BelongsTo<Model&UserContract, DeviceUser>.
     */
    public function user(): BelongsTo
    {
        /** @var class-string<Model> */
        $userClass = XotData::make()->getUserClass();

        return $this->belongsTo($userClass);
    }

    /**
     * old_return BelongsTo<Model&ProfileContract, DeviceUser>.
     */
    public function profile(): BelongsTo
    {
        /* @var class-string<Model> */
        $profileClass = XotData::make()->getProfileClass();

        return $this->belongsTo($profileClass, 'user_id', 'user_id');
    }
}
