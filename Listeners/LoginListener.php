<?php
namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Login;
use Modules\User\Models\DeviceUser;
use Modules\User\Actions\GetCurrentDeviceAction;


class LoginListener{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        //Session::flash('login-success', 'Hello ' . $event->user->name . ', welcome back!');
       $device=app(GetCurrentDeviceAction::class)->execute();
       $user=$event->user;
       //$user->devices()->syncWithoutDetaching($device->id,['login_at'=>now(),'logout_at'=>null]);
       //$res= $user->devices()->syncWithPivotValues($device->id,['login_at'=>now(),'logout_at'=>null]);
       $pivot=DeviceUser::firstOrCreate(['user_id'=>$user->id,'device_id'=>$device->id]);
       $pivot->update(['login_at'=>now(),'logout_at'=>null]);
      
      

    }
}