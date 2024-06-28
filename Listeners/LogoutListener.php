<?php

declare(strict_types=1);

namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Logout;
use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Models\DeviceUser;

class LogoutListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        // Session::flash('login-success', 'Hello ' . $event->user->name . ', welcome back!');
        $device = app(GetCurrentDeviceAction::class)->execute();
        $user = $event->user;
        // $user->devices()->syncWithoutDetaching($device->id,['login_at'=>now(),'logout_at'=>null]);
        // $res= $user->devices()->syncWithPivotValues($device->id,['login_at'=>now(),'logout_at'=>null]);
        $pivot = DeviceUser::firstOrCreate(['user_id' => $user->getAuthIdentifier(), 'device_id' => $device->id]);
        $pivot->update(['logout_at' => now()]);
    }
}
