<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

interface CreatesNewUsers
{
    /**
     * Create a newly registered user.
     */
    public function create(array $input): UserContract;
}
