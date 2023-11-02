<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Modules\Xot\Datas\XotData;
// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Modules\Xot\Contracts\UserContract;
use Spatie\QueueableAction\QueueableAction;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;

class CreateUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(SocialiteUserContract $oauthUser): UserContract
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
