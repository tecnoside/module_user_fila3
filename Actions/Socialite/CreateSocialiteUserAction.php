<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Laravel\Socialite\Contracts\User as SocialiteUserContract;
// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Modules\User\Models\SocialiteUser;
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

class CreateSocialiteUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $provider, SocialiteUserContract $oauthUser, User $user): SocialiteUser
    {
        return SocialiteUser::create([
            'user_id' => $user->getKey(),
            'provider' => $provider,
            'provider_id' => $oauthUser->getId(),
        ]);
    }
}
