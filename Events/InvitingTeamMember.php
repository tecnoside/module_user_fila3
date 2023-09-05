<?php

declare(strict_types=1);

namespace Modules\User\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Modules\User\Contracts\TeamContract;

class InvitingTeamMember
{
    use Dispatchable;

    /**
     * The team instance.
     */
    public TeamContract $team;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(TeamContract $teamContract, /**
     * The team member being added.
     */
        public string $email, /**
     * The role of the invitee.
     */
        public string $role)
    {
        $this->team = $teamContract;
    }
}
