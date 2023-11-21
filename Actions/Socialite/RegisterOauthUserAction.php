<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Laravel\Socialite\Facades\Socialite;
use Modules\User\Events\Registered;
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

class RegisterOauthUserAction
{
    use QueueableAction;

    public function execute(string $provider, SocialiteUserContract $oauthUser): RedirectResponse
    {
        $socialiteUser = DB::transaction(static function () use ($provider, $oauthUser) {
            // Create a user
            $user = app(CreateUserAction::class)
                ->execute(
                    provider: $provider,
                    oauthUser: $oauthUser,
                );
            // Create a new socialite user instance
            return app(CreateSocialiteUserAction::class)
                ->execute(
                    provider: $provider,
                    oauthUser: $oauthUser,
                    user: $user,
                );
        });

        // Dispatch the registered event
        Registered::dispatch($socialiteUser);

        // Login the user
        return app(LoginUserAction::class)->execute($socialiteUser);
    }
}
