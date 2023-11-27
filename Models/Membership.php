<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * Modules\User\Models\Membership.
 *
 * @method static Builder|Membership newModelQuery()
 * @method static Builder|Membership newQuery()
 * @method static Builder|Membership query()
 * @mixin \Eloquent
 */
class Membership extends BasePivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var string
     */
    protected $connection = 'user';

    /**
     * The table associated with the pivot model.
     *
     * @var string
     */
    protected $table = 'team_user';
}
