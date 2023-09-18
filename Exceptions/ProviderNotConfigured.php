<?php

declare(strict_types=1);

namespace Modules\User\Exceptions;

class ProviderNotConfigured extends \LogicException
{
    public static function make(string $provider): static
    {
        return new static('Provider "'.$provider.'" is not configured.');
    }
}
