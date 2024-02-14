<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
// //use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Services\FactoryService;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseUuidModel.
 */
abstract class BaseUuidModel extends Model
{
    // use Searchable;
    // //use Cachable;
    use HasFactory;
    use HasUuids;
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var int
     */
    protected $perPage = 30;

    /**
     * @var string
     */
    protected $connection = 'user';

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [];
<<<<<<< HEAD

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
=======

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Undocumented variable.
     *
     * @var string
     */
>>>>>>> 9265a1b6892b4aca6d1b66e51335bf40ddf5f6fb
    protected $keyType = 'string';

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password'
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return FactoryService::newFactory(static::class);
    }
}
