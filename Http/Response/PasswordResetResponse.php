<?php

declare(strict_types=1);

namespace Modules\User\Http\Response;

use Filament\Facades\Filament;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Webmozart\Assert\Assert;

class PasswordResetResponse implements Responsable
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        Assert::string($path = config('password-expiry.after_password_reset_redirect') ?: Filament::getLoginUrl());

        return redirect()->to($path);
    }
}
