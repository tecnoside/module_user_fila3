<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Modules\Xot\Contracts\UserContract;

interface CreatesNewUsers
{
    /**
     * Create a newly registered user.
     */
    public function create(array $input): UserContract;
}
