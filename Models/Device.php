<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Database\Factories\DeviceFactory;
use Modules\Xot\Contracts\UserContract;

/**
 * Device model representing a user's device in the system.
 *
 * @property EloquentCollection<int, \Illuminate\Database\Eloquent\Model&UserContract> $users
 * @property int|null                                                                  $users_count
 *
 * @method static DeviceFactory  factory($count = null, $state = [])
 * @method static Builder|Device newModelQuery()
 * @method static Builder|Device newQuery()
 * @method static Builder|Device query()
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
 * @property DeviceUser                                  $pivot
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @mixin \Eloquent
 */
class Device extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'mobile_id',
        'languages',
        'device',
        'platform',
        'browser',
        'version',
        'is_robot',
        'robot',
        'is_desktop',
        'is_mobile',
        'is_tablet',
        'is_phone',
    ];

    /**
     * Define the attribute casting for the model.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'languages' => 'array',
            'is_robot' => 'boolean',
            'is_desktop' => 'boolean',
            'is_mobile' => 'boolean',
            'is_tablet' => 'boolean',
            'is_phone' => 'boolean',
        ];
    }

    /**
     * Define the many-to-many relationship between devices and users.
     */
    public function users(): BelongsToMany
    {
        $pivotClass = DeviceUser::class;
        $pivot = app($pivotClass);
        $pivotFields = $pivot->getFillable();
        $userClass = \Modules\Xot\Datas\XotData::make()->getUserClass();

        return $this->belongsToMany($userClass)
            ->using($pivotClass)
            ->withPivot($pivotFields)
            ->withTimestamps();
    }
}
