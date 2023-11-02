<?php

declare(strict_types=1);

namespace Modules\User\Contracts;
use Modules\Xot\Contracts\UserContract;

/**
 * ---.
 */
interface InvitesTeamMembers
{
    public function invite(UserContract $userContract, TeamContract $teamContract, string $email, string $role = null): void;
}
