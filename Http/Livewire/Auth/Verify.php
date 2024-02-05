<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

use Livewire\Component;
use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\Auth;
use Modules\Xot\Services\FileService;

class Verify extends Component
{
    public function resend(): void
    {
        Assert::notNull($user = Auth::user());
        if ($user->hasVerifiedEmail()) {
            redirect(route('home'));
        }

        $user->sendEmailVerificationNotification();

        $this->dispatch('resent');

        session()->flash('resent');
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        FileService::viewCopy('user::livewire.auth.verify', 'pub_theme::livewire.auth.verify');
        FileService::viewCopy('user::layouts.auth', 'pub_theme::layouts.auth');
        FileService::viewCopy('user::layouts.base', 'pub_theme::layouts.base');

        return view('pub_theme::livewire.auth.verify')
            ->extends('pub_theme::layouts.auth');
    }
}
