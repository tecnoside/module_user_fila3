<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

/**
 * ---.
 */
interface InvitesTeamMembers
{
    public function invite(UserContract $user, TeamContract $team, string $email, string $role = null): void;
}
