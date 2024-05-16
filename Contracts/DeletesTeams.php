<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

/**
 * ---.
 */
interface DeletesTeams
{
    /**
     * ---.
     */
    public function delete(TeamContract $teamContract): void;
}
