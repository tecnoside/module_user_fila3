<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\User\Datas;

use Modules\Tenant\Services\TenantService;
use Spatie\LaravelData\Data;

/**
 * Undocumented class.
 */
class PasswordData extends Data
{
    public int $otp_expiration_minutes; // Durata in minuti della validità della password temporanea
    public int $otp_length;  // Lunghezza del codice OTP
    public int $expires_in; // The number of days before the password expires.

    public int $min = 6; // The minimum size of the password.
    public bool $mixedCase = false; // If the password requires at least one uppercase and one lowercase letter.
    public bool $letters = false; // If the password requires at least one letter.
    public bool $numbers = false; // If the password requires at least one number.
    public bool $symbols = false; // If the password requires at least one symbol.
    public bool $uncompromised = false; // If the password should not have been compromised in data leaks.
    public int $compromisedThreshold = 1; // The number of times a password can appear in data leaks before being considered compromised.

    private static ?self $instance = null;

    public static function make(): self
    {
        if (! self::$instance) {
            $data = TenantService::getConfig('password');
            self::$instance = self::from($data);
        }

        return self::$instance;
    }
}
