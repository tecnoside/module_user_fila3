<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

/**
 * ---.
 */
interface UpdatesTeamNames
{
    public function update(UserContract $user, TeamContract $team, array $input): void;
}
