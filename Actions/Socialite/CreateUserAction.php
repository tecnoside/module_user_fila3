<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Laravel\Socialite\Contracts\User as SocialiteUserContract;
// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Modules\Xot\Datas\XotData;
use Spatie\QueueableAction\QueueableAction;

class CreateUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(SocialiteUserContract $oauthUser)
    {
        $xot = XotData::make();
        $userClass = $xot->getUserClass();

        return $userClass::create(
            [
                'name' => $oauthUser->getName(),
                'email' => $oauthUser->getEmail(),
            ]
        );
    }
}
