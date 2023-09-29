<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Socialite;

use Illuminate\View\View;
use Livewire\Component;

class Buttons extends Component
{
    public function render(): View
    {
        // $providers = FilamentSocialite::getProviderButtons();
        $providers = config('filament-socialite.providers');

        return view('user::livewire.socialite.buttons', [
            'providers' => $providers,
        ]);
    }
}
