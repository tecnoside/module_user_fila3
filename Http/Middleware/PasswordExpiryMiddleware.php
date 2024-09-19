<?php

declare(strict_types=1);

namespace Modules\User\Http\Middleware;

use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PasswordExpiryMiddleware
{
    public function handle(Request $request, \Closure $next): Response|RedirectResponse
    {
        if (
            $this->passwordHasExpired()
            && ! $request->routeIs($this->getPasswordExpiryRoute())
            && ! $request->routeIs('*.auth.*')
        ) {
            return redirect(route($this->getPasswordExpiryRoute()));
        }

        return $next($request);
    }

    public function getPasswordExpiryRoute(): string
    {
        // *
        $route = Filament::getCurrentPanel()?->generateRouteName(
            // config('password-expiry.password_expiry_route')
            // 'password-expiry.reset-password'
            // 'password.expired'
            'pages.password-expired'
        ) ?? '#';

        return $route;
        // */
        // return 'filament.admin.auth.password-reset.request';
    }

    protected function passwordHasExpired(): bool
    {
        return true;
        /*
        if (
            blank(
                config('password-expiry.auth_class')::auth()
                    ->user()
                    ?->{config('password-expiry.column_name')}
            )
        ) {
            return true;
        }

        return now()
            ->isAfter(
                config('password-expiry.auth_class')::auth()
                    ->user()
                    ->{config('password-expiry.column_name')}
            );
        */
    }
}
