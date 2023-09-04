<?php

declare(strict_types=1);

namespace Modules\User\Events;

use ArtMin96\FilamentJet\Contracts\TeamContract;
use Illuminate\Foundation\Events\Dispatchable;

class InvitingTeamMember
{
    use Dispatchable;

    /**
     * The team instance.
     */
    public TeamContract $team;

    /**
     * The team member being added.
     */
    public string $email;

    /**
     * The role of the invitee.
     */
    public string $role;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(TeamContract $team, string $email, string $role)
    {
        $this->team = $team;
        $this->email = $email;
        $this->role = $role;
    }
}
