<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Jenssegers\Agent\Agent;
use Modules\User\Models\Device;
use Modules\User\Models\SocialiteUser;
use Modules\Xot\Contracts\UserContract;
use Spatie\QueueableAction\QueueableAction;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;

class GetCurrentDeviceAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute():Device{
        $agent = new Agent();

        $data=[
            'device'=> $agent->device(),
            'platform'=> $agent->platform(),
            'browser' => $agent->browser(),
            //'version' => $agent->version($agent->browser()),
            'is_desktop' => $agent->isDesktop(),
            'is_mobile' => $agent->isMobile(),
            'is_tablet' => $agent->isTablet(),
            'is_phone' => $agent->isPhone(),
            'is_robot' => $agent->isRobot(),
            //'robot' => $agent->robot(),
        ];
        $up=[
            'version' => $agent->version($agent->browser()),
            'robot' => $agent->robot(),
        ];
        $device=Device::firstOrCreate($data);
        $device->update($up);
        return $device;

    }
}