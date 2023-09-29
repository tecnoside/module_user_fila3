<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Modules\User\Events\Registered;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Laravel\Socialite\Facades\Socialite;
use Modules\User\Events;
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

class RegisterOauthUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $provider, SocialiteUserContract $oauthUser)
    {
        $socialiteUser = DB::transaction(function () use ($provider, $oauthUser) {
            // Create a user
            // $user = app()->call($this->socialite->getCreateUserCallback(), ['provider' => $provider, 'oauthUser' => $oauthUser, 'socialite' => $this->socialite]);
            $user = app(CreateUserAction::class)->execute(oauthUser: $oauthUser);
            // Create a socialite user
            // return app()->call($this->socialite->getCreateSocialiteUserCallback(), ['provider' => $provider, 'oauthUser' => $oauthUser, 'user' => $user, 'socialite' => $this->socialite]);
            $socialiteUser = app(CreateSocialiteUserAction::class)->execute(provider: $provider, oauthUser: $oauthUser, user: $user);

            return $socialiteUser;
        });

        // Dispatch the registered event
        Registered::dispatch($socialiteUser);

        // Login the user
        return app(LoginUserAction::class)->execute($socialiteUser);
    }
}
