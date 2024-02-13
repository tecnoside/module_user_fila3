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
     */
    public static bool $snakeAttributes = true;

    public bool $incrementing = false;

    public bool $timestamps = true;

    protected $perPage = 30;

    protected string $connection = 'user';

    /**
     * @var array<string, string>
     */
    protected array $casts = [
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
    protected array $appends = [];

    protected string $primaryKey = 'id';

    /**
     * Undocumented variable.
     */
    protected string $keyType = 'string';

    /**
     * @var array<int, string>
     */
    protected array $hidden = [
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
