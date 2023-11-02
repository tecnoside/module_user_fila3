<?php

declare(strict_types=1);

namespace Modules\User\Contracts;
use Modules\Xot\Contracts\UserContract;

/**
 * ---.
 */
interface DeletesUsers
{
    public function delete(UserContract $userContract): void;
}
