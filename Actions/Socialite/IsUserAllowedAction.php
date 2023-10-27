<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Spatie\QueueableAction\QueueableAction;

class IsUserAllowedAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(SocialiteUserContract $user): bool
    {
        $domains = app(GetDomainAllowListAction::class)->execute();

        // When no domains are specified, all users are allowed
        if ((is_countable($domains) ? \count($domains) : 0) < 1) {
            return true;
        }

        // Get the domain of the email for the specified user
        $emailDomain = Str::of($user->getEmail())
            ->afterLast('@')
            ->lower()
            ->__toString();

        // See if everything after @ is in the domains array
        return \in_array($emailDomain, $domains, true);
    }
}
