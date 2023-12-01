<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Modules\User\Models\Device.
 *
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\User> $users
 * @property int|null                                                                 $users_count
 *
 * @method static \Modules\User\Database\Factories\DeviceFactory factory($count = null, $state = [])
 * @method static Builder|Device                                 newModelQuery()
 * @method static Builder|Device                                 newQuery()
 * @method static Builder|Device                                 query()
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

    /**
     * @var array<string, string>
     */
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
