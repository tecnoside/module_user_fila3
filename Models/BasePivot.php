<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
// //use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

/**
 * Class BasePivot.
 */
abstract class BasePivot extends Pivot
{
    use Updater;
    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see  https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    /**
     * @var bool
     */
    public $incrementing = true;

    protected $perPage = 30;

    // use Searchable;

    /**
     * @var string
     */
    protected $connection = 'user';
    /**
     * @var array
     */
    protected $appends = [];
    /**
     * @var array<string, string>
     */
    protected $casts = [];
    /**
     * @var array<string>
     */
    protected $dates = ['created_at', 'updated_at'];
    /**
     * Undocumented variable.
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
