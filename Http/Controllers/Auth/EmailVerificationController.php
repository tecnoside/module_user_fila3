<?php

declare(strict_types=1);

namespace Modules\User\Http\Controllers\Auth;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Modules\User\Http\Controllers\Controller;

class EmailVerificationController extends Controller
{
    public function __invoke(string $id, string $hash): RedirectResponse
    {
        $user = Auth::user();
        if (null == $user) {
            throw new AuthorizationException();
        }
        // if (! hash_equals((string) $id, (string) Auth::user()->getKey())) {
        if (! hash_equals((string) $id, (string) Auth::id())) {
            throw new AuthorizationException();
        }

        if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException();
        }

        if ($user->hasVerifiedEmail()) {
            return redirect(route('home'));
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect(route('home'));
    }
}
