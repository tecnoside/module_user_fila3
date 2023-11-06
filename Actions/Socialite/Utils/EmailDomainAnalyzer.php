<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite\Utils;

use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User;

final class EmailDomainAnalyzer
{
    private User $ssoUser;

    public function __construct(
        private readonly string $ssoProvider,
    ) {
    }

    public function setUser(User $ssoUser): self
    {
        $this->ssoUser = $ssoUser;

        return $this;
    }

    public function hasUnrecognizedDomain(): bool
    {
        return ! (
            $this->hasFirstPartyDomain()
            || $this->hasClientDomain()
        );
    }

    public function hasFirstPartyDomain(): bool
    {
        return Str::of($this->firstPartyDomain())
            ->after('@')
            ->exactly(
                Str::of($this->ssoUser->getEmail())->after('@'),
            );
    }

    public function hasClientDomain(): bool
    {
        $clientEmailDomain = $this->clientDomain();

        if (empty($clientEmailDomain)) {
            return false;
        }

        return Str::of($clientEmailDomain)
            ->after('@')
            ->exactly(
                Str::of($this->ssoUser->getEmail())->after('@'),
            );
    }

    private function firstPartyDomain(): string
    {
        return config("services.{$this->ssoProvider}.email_domains.first_party.tld");
    }

    private function clientDomain(): ?string
    {
        $domain = config("services.{$this->ssoProvider}.email_domains.client.tld");

        return empty($domain)
            ? null
            : $domain;
    }
}
