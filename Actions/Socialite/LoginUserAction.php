<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Filament\Facades\Filament;
use Modules\User\Events;
use Modules\User\Models\SocialiteUser;
use Spatie\QueueableAction\QueueableAction;

class LoginUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(SocialiteUser $socialiteUser)
    {
        $user = $socialiteUser->user;
        Filament::auth()->login($user);

        // session()->regenerate();

        return redirect()->intended(Filament::getUrl());
    }
}
