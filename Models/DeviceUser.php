<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Datas\XotData;

/**
 * Modules\User\Models\DeviceUser.
 *
 * @property Device|null $device
 *
 * @method static Builder|DeviceUser newModelQuery()
 * @method static Builder|DeviceUser newQuery()
 * @method static Builder|DeviceUser query()
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
 * @method static Builder|DeviceUser whereCreatedAt($value)
 * @method static Builder|DeviceUser whereCreatedBy($value)
 * @method static Builder|DeviceUser whereDeviceId($value)
 * @method static Builder|DeviceUser whereId($value)
 * @method static Builder|DeviceUser whereLoginAt($value)
 * @method static Builder|DeviceUser whereLogoutAt($value)
 * @method static Builder|DeviceUser wherePushNotificationsEnabled($value)
 * @method static Builder|DeviceUser wherePushNotificationsToken($value)
 * @method static Builder|DeviceUser whereUpdatedAt($value)
 * @method static Builder|DeviceUser whereUpdatedBy($value)
 * @method static Builder|DeviceUser whereUserId($value)
 *
 * @mixin \Eloquent
 */
class DeviceUser extends BasePivot
{
    /**
     * Undocumented variable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id',
        'device_id',
        'user_id',
        'login_at',
        'logout_at',
        'push_notifications_token',
        'push_notifications_enabled',
    ];

    /** @var array<string, string> */
    protected $casts = [
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

    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }

    public function user(): BelongsTo
    {
        $userClass = XotData::make()->getUserClass();

        return $this->belongsTo($userClass);
    }

    /**
     * @return BelongsTo<ProfileContract, DeviceUser>
     */
    public function profile(): BelongsTo
    {
        $profileClass = XotData::make()->getProfileClass();

        return $this->belongsTo($profileClass, 'user_id', 'user_id');
    }
}
