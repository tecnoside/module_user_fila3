<?php

declare(strict_types=1);
/**
 * @see https://github.com/rappasoft/laravel-authentication-log/blob/main/src/Traits/AuthenticationLoggable.php
 */

namespace Modules\User\Models\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Modules\User\Models\AuthenticationLog;

trait HasAuthenticationLogTrait
{
    public function authentications(): MorphMany
    {
        return $this->morphMany(AuthenticationLog::class, 'authenticatable')->latest('login_at');
    }

    public function latestAuthentication(): MorphOne
    {
        return $this->morphOne(AuthenticationLog::class, 'authenticatable')->latestOfMany('login_at');
    }

    public function notifyAuthenticationLogVia(): array
    {
        return ['mail'];
    }

    public function lastLoginAt(): ?Carbon
    {
        return $this->authentications()->first()?->login_at;
    }

    public function lastSuccessfulLoginAt(): ?Carbon
    {
        return $this->authentications()->whereLoginSuccessful(true)->first()?->login_at;
    }

    public function lastLoginIp(): ?string
    {
        return $this->authentications()->first()?->ip_address;
    }

    public function lastSuccessfulLoginIp(): ?string
    {
        return $this->authentications()->whereLoginSuccessful(true)->first()?->ip_address;
    }

    public function previousLoginAt(): ?Carbon
    {
        return $this->authentications()->skip(1)->first()?->login_at;
    }

    public function previousLoginIp(): ?string
    {
        return $this->authentications()->skip(1)->first()?->ip_address;
    }
}
