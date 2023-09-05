<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

/**
 * ---.
 */
interface DeletesUsers
{
    public function delete(UserContract $userContract): void;
}
