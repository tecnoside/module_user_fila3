<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\Xot\Models\Extra as XotBaseExtra;

class Extra extends XotBaseExtra
{
    /** @var string */
    protected $connection = 'user';
}
