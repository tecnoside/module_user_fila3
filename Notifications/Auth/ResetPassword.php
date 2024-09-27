<?php

declare(strict_types=1);

namespace Modules\User\Notifications\Auth;

use Illuminate\Auth\Notifications\ResetPassword as BaseNotification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetPassword extends BaseNotification
{
    public string $url;

    protected function resetUrl($notifiable): string
    {
        return $this->url;
    }

    /**
     * Get the reset password notification mail message for the given URL.
     *
     * @param string $url
     *
     * @return MailMessage
     */
    protected function buildMailMessage($url)
    {
        return (new MailMessage())
            ->subject(Lang::get('user::email.password_reset_subject'))
            ->line(Lang::get('user::email.password_cause_of_email'))
            ->action(Lang::get('user::email.reset_password'), $url)
            ->line(Lang::get('user::email.password_reset_expiration', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('user::email.password_if_not_requested'));
    }
}
