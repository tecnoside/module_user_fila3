<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

/**
 * ---.
 */
interface UpdatesUserProfileInformation
{
    public function update(UserContract $user, array $input): void;
}
