<?php

declare(strict_types=1);

namespace Modules\User\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Modules\Xot\Contracts\UserContract;

class Otp extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public UserContract $user, public string $code)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail']; // Puoi aggiungere anche 'database', 'slack', ecc. se vuoi supportare altri canali.
    }

    /**
     * Get the mail representation of the notification.
     *
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject(__('user::otp.mail.subject'))
            ->greeting(__('user::otp.mail.greeting'))
            ->line(__('user::otp.mail.line1', ['code' => $this->code]))
            ->line(__('user::otp.mail.line2', ['seconds' => config('filament-otp-login.otp_code.expires')]))
            ->line(__('user::otp.mail.line3'))
            ->salutation(__('user::otp.mail.salutation', ['app_name' => config('app.name')]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
        ];
    }
}
