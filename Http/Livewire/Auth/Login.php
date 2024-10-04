<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Xot\Actions\File\ViewCopyAction;

class Login extends Component
{
    public string $email = '';

    public string $password = '';

    public bool $remember = false;

    /**
     * @var array<string, array<int, string>>
     */
    protected array $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    /**
     * Execute the action.
     *
     * @return RedirectResponse|void
     */
    public function authenticate()
    {
        $this->validate();
        $credentials = ['email' => $this->email, 'password' => $this->password];
        $remember = $this->remember;
        if (! Auth::attempt($credentials, $remember)) {
            $this->addError('email', trans('user::auth.failed'));

            return;
        }

        return redirect()->intended(route('home'));
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        app(ViewCopyAction::class)->execute('user::livewire.auth.login', 'pub_theme::livewire.auth.login');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');

        $view = 'pub_theme::livewire.auth.login';

        return view($view)
            ->extends('pub_theme::layouts.auth');
    }
}
