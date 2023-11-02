<?php

declare(strict_types=1);

namespace Modules\User\Contracts;
use Modules\Xot\Contracts\UserContract;

/**
 * ---.
 */
interface ResetsUserPasswords
{
    public function reset(UserContract $userContract, array $input): void;
}
