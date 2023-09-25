<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Socialite;

use Livewire\Component;

class Buttons extends Component
{
    public function render(): \Illuminate\View\View
    {
        // $providers = FilamentSocialite::getProviderButtons();
        $providers = config('filament-socialite.providers');

        return view('user::livewire.socialite.buttons', [
            'providers' => $providers,
        ]);
    }
}
