<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

interface TwoFactorAuthenticationProvider
{
    /**
     * Generate a new secret key.
     */
    public function generateSecretKey(): string;

    /**
     * Get the two factor authentication QR code URL.
<<<<<<< HEAD
=======
     *
     * @param  string  $companyName
     * @param  string  $companyEmail
     * @param  string  $secret
     * @return string
>>>>>>> 2a8c136 (Dusting)
     */
    public function qrCodeUrl(string $companyName, string $companyEmail, string $secret): string;

    /**
     * Verify the given token.
<<<<<<< HEAD
=======
     *
     * @param  string  $secret
     * @param  string  $code
     * @return bool
>>>>>>> 2a8c136 (Dusting)
     */
    public function verify(string $secret, string $code): bool;
}
