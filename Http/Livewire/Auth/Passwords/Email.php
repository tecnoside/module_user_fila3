<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth\Passwords;

use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Modules\Xot\Services\FileService;

class Email extends Component
{
    public string $email;

    public ?string $emailSentMessage = null; // was false

    /**
     * Undocumented function.
     */
    public function sendResetPasswordLink(): void
    {
        $this->validate([
            'email' => ['required', 'email'],
        ]);

        $response = $this->broker()->sendResetLink(['email' => $this->email]);

        if (Password::RESET_LINK_SENT === $response) {
            $this->emailSentMessage = trans($response);

            return;
        }

        $this->addError('email', trans($response));
    }

    /**
     * Get the broker to be used during password reset.
     */
    public function broker(): \Illuminate\Contracts\Auth\PasswordBroker
    {
        return Password::broker();
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        FileService::viewCopy('user::livewire.auth.passwords.email', 'pub_theme::livewire.auth.passwords.email');
        FileService::viewCopy('user::layouts.auth', 'pub_theme::layouts.auth');
        FileService::viewCopy('user::layouts.base', 'pub_theme::layouts.base');

        return view('pub_theme::livewire.auth.passwords.email')
            ->extends('pub_theme::layouts.auth');
    }
}