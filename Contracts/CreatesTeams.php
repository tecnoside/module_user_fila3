<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Modules\Xot\Contracts\UserContract;

interface CreatesTeams
{
    public function create(UserContract $userContract, array $input): TeamContract;
}
