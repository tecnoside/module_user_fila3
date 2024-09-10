<?php

declare(strict_types=1);

namespace Modules\User\Models;

class User extends BaseUser
{
    /** @var string */
    protected $connection = 'user';
}
