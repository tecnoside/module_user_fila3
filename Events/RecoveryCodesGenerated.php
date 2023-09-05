<?php

declare(strict_types=1);

namespace Modules\User\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Modules\User\Contracts\UserContract;

class RecoveryCodesGenerated
{
    use Dispatchable;

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
