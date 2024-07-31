<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\Xot\Models\Extra as XotBaseExtra;

/**
 * @property \Spatie\SchemalessAttributes\SchemalessAttributes $extra_attributes
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Extra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Extra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Extra query()
 * @method static Builder|Extra                               withExtraAttributes()
<<<<<<< HEAD
 *
=======
>>>>>>> 824c0fb (📝 (Extra.php): Remove unnecessary conflict markers and clean up code formatting in Extra model)
 * @mixin \Eloquent
 */
class Extra extends XotBaseExtra
{
    /** @var string */
    protected $connection = 'user';
}
