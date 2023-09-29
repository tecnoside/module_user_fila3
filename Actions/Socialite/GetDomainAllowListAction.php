<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Spatie\QueueableAction\QueueableAction;

class GetDomainAllowListAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(): string|array
    {
        return config('filament-socialite.domain_allowlist');
    }
}
