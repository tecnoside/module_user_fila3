<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\User\Models\BaseUser;


class User extends BaseUser{
    /** @var string */
    protected $connection = 'user';
}
