<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

/**
 * ---.
 */
interface InvitesTeamMembers
{
    public function invite(UserContract $userContract, TeamContract $teamContract, string $email, ?string $role = null): void;
}
