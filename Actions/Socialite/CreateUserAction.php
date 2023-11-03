<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Models\User;
// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Spatie\QueueableAction\QueueableAction;

class CreateUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
<<<<<<< HEAD
    public function execute(SocialiteUserContract $oauthUser): UserContract
=======
    public function execute(SocialiteUserContract $oauthUser): User
>>>>>>> 697de18 (up)
    {
        /*
        $xot = XotData::make();
        $userClass = $xot->getUserClass();

        return $userClass::create(
            [
                'name' => $oauthUser->getName(),
                'email' => $oauthUser->getEmail(),
            ]
        );
        */
        return User::create(
            [
                'name' => $oauthUser->getName(),
                'email' => $oauthUser->getEmail(),
            ]
        );
    }
}
