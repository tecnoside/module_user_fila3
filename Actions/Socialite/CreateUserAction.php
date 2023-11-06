<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\Xot\Datas\XotData;
use Spatie\QueueableAction\QueueableAction;

class CreateUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $provider, SocialiteUserContract $oauthUser): Authenticatable
    {
        // Resolve `users` table required attributes
        // from the identity provider
        $userAttributes = app(
            GetUserModelAttributesFromSocialiteAction::class,
            [
                'provider' => $provider,
                'oauthUser' => $oauthUser,
            ],
        );

        // Store the new entity into `users` table
        $userClass = XotData::resolveUserClass();
        $newlyCreatedUser = $userClass::create(
            [
                'name' => $userAttributes->name,
                'surname' => $userAttributes->surname,
                'email' => $userAttributes->email,
            ]
        );

        // Finally, assign the default set of roles
        app(
            SetDefaultRolesBySocialiteUserAction::class,
            [
                'provider' => $provider,
                'userModel' => $newlyCreatedUser,
            ]
        )->execute(userModel: $newlyCreatedUser, oauthUser: $oauthUser);

        return $newlyCreatedUser->refresh();
    }
}
