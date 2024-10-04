<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Actions;

use Carbon\Carbon;
use Filament\Notifications\Notification as FilamentNotification;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Modules\User\Datas\PasswordData;
use Modules\User\Models\User;
use Modules\User\Notifications\Auth\Otp;

class SendOtpAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'send_otp';
    }

    protected function setUp(): void
    {
        $pwd = PasswordData::make();
        parent::setUp();

        $this
            ->label('')
            ->tooltip(__('Send Temporary Password'))
            ->icon('heroicon-o-key')
            ->action(function (User $record) use ($pwd) {
                $temporaryPassword = Str::random(12);
                $expirationTime = Carbon::now()->addMinutes($pwd->otp_expiration_minutes);
                // *
                $record->update([
                    'password' => Hash::make($temporaryPassword),
                    'is_otp' => true,
                    'password_expires_at' => $expirationTime,
                ]);
                // */

                // Here you would typically send an email with the temporary password
                // For example:
                // Mail::to($record->email)->send(new TemporaryPasswordMail($temporaryPassword, $expirationTime));
                // Invia email con la password temporanea
                // Mail::to($record->email)->send(new OtpMail($record,$temporaryPassword));
                Notification::route('mail', $record->email)
                   ->notify(new Otp($record, $temporaryPassword));

                FilamentNotification::make()
                    ->title(__('Temporary password sent successfully.'))
                    ->success()
                    ->send();
            })
            ->requiresConfirmation()
            ->modalHeading(__('Send Temporary Password'))
            ->modalSubheading(__('Are you sure you want to send a temporary password to this user? They will be required to change it upon first login.'))
            ->modalButton(__('Yes, send temporary password'));
    }
}
