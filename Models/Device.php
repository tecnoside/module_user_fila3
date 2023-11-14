<?php

declare(strict_types=1);

namespace Modules\User\Models;

/**
 * Modules\User\Models\Device.
 *
 * @property int                             $id
 * @property string|null                     $mobile_id
 * @property string|null                     $device
 * @property string|null                     $platform
 * @property string|null                     $browser
 * @property string|null                     $version
 * @property int|null                        $is_desktop
 * @property int|null                        $is_mobile
 * @property int|null                        $is_tablet
 * @property int|null                        $is_phone
 * @property int|null                        $is_robot
 * @property string|null                     $robot
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $updated_by
 * @property string|null                     $created_by
 * @method static \Modules\User\Database\Factories\DeviceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Device   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Device   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Device   query()
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereBrowser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereIsDesktop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereIsMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereIsPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereIsRobot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereIsTablet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereMobileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereRobot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device   whereVersion($value)
 * @mixin \Eloquent
 */
class Device extends BaseModel
{
    /**
     * Undocumented variable.
     *
     * @var array<string>
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
