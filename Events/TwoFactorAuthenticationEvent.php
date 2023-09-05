<?php

declare(strict_types=1);

namespace Modules\User\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Modules\User\Contracts\UserContract;

abstract class TwoFactorAuthenticationEvent
{
    use Dispatchable;

    /**
     * The team member being added.
     */
    public UserContract $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(UserContract $userContract)
    {
        $this->user = $userContract;
    }
}
