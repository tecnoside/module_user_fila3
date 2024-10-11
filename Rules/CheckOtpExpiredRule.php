<?php

namespace Modules\User\Rules;


use Illuminate\Support\Facades\Auth;
use Modules\User\Datas\PasswordData;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;


class CheckOtpExpiredRule implements ValidationRule
{
    /**
     * Determina se la regola di validazione si applica.
     *
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = Auth::user();
        if (null === $user) {
            //return false;
            $fail('utente non loggato');
            return ;
        }

        // Get OTP expiration minutes from PasswordData
        $pwd_data = PasswordData::make();
        $otpExpirationMinutes = $pwd_data->otp_expiration_minutes;

        // Check if OTP is expired using updated_at
        if(!($user->updated_at && now()->greaterThan($user->updated_at->addMinutes($otpExpirationMinutes)))){
            $fail($this->message());
        }
    }

    /**
     * Ottiene il messaggio di errore da visualizzare.
     *
     * @return string
     */
    public function message()
    {
        return __('user::otp.notifications.otp_expired.body');
    }
}
