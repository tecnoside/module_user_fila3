<?php

declare(strict_types=1);

namespace Modules\User\Contracts;
use Modules\Xot\Contracts\UserContract;

/**
 * Modules\User\Contracts\TwoFactorAuthenticatableContract.
 *
 * @mixin \Eloquent
 */
interface TwoFactorAuthenticatableContract
{
    /**
     * Determine if two-factor authentication has been enabled.
     *
     * @return bool
     */
    public function hasEnabledTwoFactorAuthentication();

    public function hasConfirmedTwoFactorAuthentication(): bool;

    /**
     * Get the user's two factor authentication recovery codes.
     *
     * @return array
     */
    public function recoveryCodes();

    /**
     * Replace the given recovery code with a new one in the user's stored codes.
     *
     * @param string $code
     *
     * @return void
     */
    public function replaceRecoveryCode($code);

    /**
     * Get the QR code SVG of the user's two factor authentication QR code URL.
     *
     * @return string
     */
    public function twoFactorQrCodeSvg();

    /**
     * Get the two factor authentication QR code URL.
     *
     * @return string
     */
    public function twoFactorQrCodeUrl();
}
