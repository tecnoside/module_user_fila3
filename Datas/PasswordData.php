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
