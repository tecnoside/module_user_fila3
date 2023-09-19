<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Filament\Facades\Filament;
use Modules\User\Events;
use Modules\User\Models\SocialiteUser;
use Spatie\QueueableAction\QueueableAction;

class LoginUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(SocialiteUser $socialiteUser)
    {
        $user = $socialiteUser->user;
        Filament::auth()->login($user);

        // session()->regenerate();

        return redirect()->intended(Filament::getUrl());

        $guard = app(GetGuardAction::class)->execute();
        // Log the user in
        $remember = config('filament-socialite.remember_login', false);

        $user = $socialiteUser->user;
        $guard->login($user, $remember);

        // dddx(['guard' => $guard, 'user' => $socialiteUser->user]);
        // Dispatch the login event
        Events\Login::dispatch($socialiteUser);

        $route = app(GetLoginRedirectRouteAction::class)->execute();
        $url = route($route);
        $url = Filament::getUrl();

        return redirect()->intended(Filament::getUrl());
        // Redirect as intended
        // return redirect()->intended(
        //    route($url)
        // );
        return redirect()->intended('/admin');
    }
}
