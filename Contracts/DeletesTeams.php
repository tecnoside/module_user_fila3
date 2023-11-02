<?php

declare(strict_types=1);

namespace Modules\User\Contracts;
use Modules\Xot\Contracts\UserContract;

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
