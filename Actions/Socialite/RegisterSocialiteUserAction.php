<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 * ---
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Illuminate\Database\Eloquent\Model;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Modules\User\Events\SocialiteUserConnected;
use Spatie\QueueableAction\QueueableAction;

class RegisterSocialiteUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $provider, SocialiteUserContract $oauthUser, Model $user)
    {
        // Create a socialite user
        // $socialiteUser = app()->call($this->socialite->getCreateSocialiteUserCallback(), ['provider' => $provider, 'oauthUser' => $oauthUser, 'user' => $user, 'socialite' => $this->socialite]);
        $socialiteUser = app(CreateSocialiteUserAction::class)->execute(provider: $provider, oauthUser: $oauthUser, user: $user);

        // Dispatch the socialite user connected event
        SocialiteUserConnected::dispatch($socialiteUser);

        // Login the user
        return app(LoginUserAction::class)->execute($socialiteUser);
    }
}
