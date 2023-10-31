<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Webmozart\Assert\Assert;
use Spatie\QueueableAction\QueueableAction;

class IsRegistrationEnabledAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(): bool
    {
        Assert::boolean(config('filament-socialite.registration'));
        return config('filament-socialite.registration');
    }
}
