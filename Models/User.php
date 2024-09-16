<?php

declare(strict_types=1);

namespace Modules\User\Models;

class User extends BaseUser
{
    /** @var string */
    protected $connection = 'user';

    public function canAccessSocialite(): bool
    {
        // Add the necessary logic
        // For example:
        return true; // or implement your own condition
    }
}
