<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Modules\Xot\Contracts\UserContract;

/**
 * ---.
 */
interface AddsTeamMembers
{
    public function add(UserContract $userContract, TeamContract $teamContract, string $email, ?string $role = null): void;
}
