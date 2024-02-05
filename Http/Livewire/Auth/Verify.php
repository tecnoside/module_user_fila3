<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Xot\Services\FileService;

class Verify extends Component
{
    public function resend()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            redirect(route('home'));
        }

        Auth::user()->sendEmailVerificationNotification();

        $this->dispatch('resent');

        session()->flash('resent');
    }

    public function render()
    {
        FileService::viewCopy('user::livewire.auth.verify', 'pub_theme::livewire.auth.verify');
        FileService::viewCopy('user::layouts.auth', 'pub_theme::layouts.auth');
        FileService::viewCopy('user::layouts.base', 'pub_theme::layouts.base');

        return view('pub_theme::livewire.auth.verify')
            ->extends('pub_theme::layouts.auth');
    }
}
