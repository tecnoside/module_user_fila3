<?php

declare(strict_types=1);

namespace Modules\User\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Modules\User\Contracts\TeamContract;
use Modules\User\Contracts\UserContract;

class TeamMemberAdded
{
    use Dispatchable;

    /**
     * The team instance.
     */
    public TeamContract $team;

    /**
     * The team member being added.
     */
    public UserContract $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(TeamContract $teamContract, UserContract $userContract)
    {
        $this->team = $teamContract;
        $this->user = $userContract;
    }
}
