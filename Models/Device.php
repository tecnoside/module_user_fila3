<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Modules\User\Database\Factories\DeviceFactory;

/**
 * Modules\User\Models\Device.
 *
 * @property Collection<int, \Modules\User\Models\User> $users
 * @property int|null                                   $users_count
 *
 * @method static DeviceFactory  factory($count = null, $state = [])
 * @method static Builder|Device newModelQuery()
 * @method static Builder|Device newQuery()
 * @method static Builder|Device query()
 *
 * @property int         $id
 * @property string|null $mobile_id
 * @property array|null  $languages
 * @property string|null $device
 * @property string|null $platform
 * @property string|null $browser
 * @property string|null $version
 * @property int|null    $is_robot
 * @property string|null $robot
 * @property int|null    $is_desktop
 * @property int|null    $is_mobile
 * @property int|null    $is_tablet
 * @property int|null    $is_phone
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder|Device whereBrowser($value)
 * @method static Builder|Device whereCreatedAt($value)
 * @method static Builder|Device whereCreatedBy($value)
 * @method static Builder|Device whereDevice($value)
 * @method static Builder|Device whereId($value)
 * @method static Builder|Device whereIsDesktop($value)
 * @method static Builder|Device whereIsMobile($value)
 * @method static Builder|Device whereIsPhone($value)
 * @method static Builder|Device whereIsRobot($value)
 * @method static Builder|Device whereIsTablet($value)
 * @method static Builder|Device whereLanguages($value)
 * @method static Builder|Device whereMobileId($value)
 * @method static Builder|Device wherePlatform($value)
 * @method static Builder|Device whereRobot($value)
 * @method static Builder|Device whereUpdatedAt($value)
 * @method static Builder|Device whereUpdatedBy($value)
 * @method static Builder|Device whereVersion($value)
 *
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

    /** @var array<string, string> */
    protected $casts = [
        // 'id' => 'string',
        // 'locales' => 'array',
        'languages' => 'array',
    ];

    public function users(): BelongsToMany
    {
        $pivot_class = DeviceUser::class;
        $pivot = app($pivot_class);
        $pivot_fields = $pivot->getFillable();

        return $this
            ->belongsToMany(User::class)
            ->using($pivot_class)
            ->withPivot($pivot_fields)
            ->withTimestamps();
    }
}
