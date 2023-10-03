<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Illuminate\Http\RedirectResponse;
use Spatie\QueueableAction\QueueableAction;

class RedirectToLoginAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $message): RedirectResponse
    {
        dddx($message);

        // Redirect back to the login route with an error message attached
        return to_route(config('filament-socialite.login_page_route', 'filament.auth.login'))
            ->withErrors([
                'email' => [
                    __($message),
                ],
            ]);
    }
}
