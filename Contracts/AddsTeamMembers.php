<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

/**
 * ---.
 */
interface AddsTeamMembers
{
    public function add(UserContract $user, TeamContract $team, string $email, string $role = null): void;
}
