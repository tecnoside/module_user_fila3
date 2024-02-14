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
     * @see https://laravel-news.com/6-eloquent-secrets
<<<<<<< HEAD
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    /**
     * @var bool
     */
    public $incrementing = true;
=======
     * @var bool
*/
    public static $snakeAttributes = true;

    /**
* @var bool
*/
public $incrementing = true;
>>>>>>> 02d0929 (up)

    protected $perPage = 30;

    // use Searchable;

    /**
     * @var string
     */
    protected $connection = 'user';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string', // must be string else primary key of related model will be typed as int
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Undocumented variable.
     */
    /**
<<<<<<< HEAD
     * @var string
     */
    protected $primaryKey = 'id';
=======
* @var string
*/
protected $primaryKey = 'id';
>>>>>>> 02d0929 (up)
}
