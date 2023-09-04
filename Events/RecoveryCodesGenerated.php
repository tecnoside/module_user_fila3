<?php

declare(strict_types=1);

namespace Modules\User\Events;

use ArtMin96\FilamentJet\Contracts\UserContract;
use Illuminate\Foundation\Events\Dispatchable;

class RecoveryCodesGenerated
{
    use Dispatchable;

    public UserContract $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(UserContract $user)
    {
        $this->user = $user;
    }
}
