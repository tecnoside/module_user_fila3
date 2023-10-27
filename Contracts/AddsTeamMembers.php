<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

/**
 * ---.
 */
interface AddsTeamMembers
{
    public function add(UserContract $userContract, TeamContract $teamContract, string $email, ?string $role = null): void;
}
