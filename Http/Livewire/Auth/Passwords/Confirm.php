<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth\Passwords;

use Livewire\Component;
use Modules\Xot\Services\FileService;

class Confirm extends Component
{
    /** @var string */
    public $password = '';

    public function confirm()
    {
        $this->validate([
            'password' => 'required|current_password',
        ]);

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        FileService::viewCopy('user::livewire.auth.passwords.confirm', 'pub_theme::livewire.auth.passwords.confirm');
        FileService::viewCopy('user::layouts.auth', 'pub_theme::layouts.auth');
        FileService::viewCopy('user::layouts.base', 'pub_theme::layouts.base');

        return view('pub_theme::livewire.auth.passwords.confirm')
            ->extends('pub_theme::layouts.auth');
    }
}
