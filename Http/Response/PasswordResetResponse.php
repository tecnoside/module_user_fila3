<?php

namespace Modules\User\Http\Response;

use Webmozart\Assert\Assert;
use Filament\Facades\Filament;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Support\Responsable;

class PasswordResetResponse implements Responsable
{
    public function toResponse($request): RedirectResponse | Redirector
    {
        Assert::string($path = config('password-expiry.after_password_reset_redirect') ?: Filament::getLoginUrl());
        return redirect()->to($path);
    }
}
