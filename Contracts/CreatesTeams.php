<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

interface CreatesTeams
{
    public function create(UserContract $userContract, array $input): TeamContract;
}
