<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Actions;

use Carbon\Carbon;
use Filament\Notifications\Notification as FilamentNotification;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Modules\User\Datas\PasswordData;
use Modules\User\Models\User;
use Modules\User\Notifications\Auth\Otp;
use Modules\Xot\Filament\Traits\TransTrait;

class SendOtpAction extends Action
{
    // use TransTrait;

    protected function setUp(): void
    {
        $pwd = PasswordData::make();
        parent::setUp();

        $this
            ->label('')
            ->tooltip(trans('user::otp.actions.send_otp'))
            ->icon('heroicon-o-key')
            ->action(function (User $record) use ($pwd) {
                $temporaryPassword = Str::random(12);
                $expirationTime = Carbon::now()->addMinutes($pwd->otp_expiration_minutes);
                $record->update([
                    'password' => Hash::make($temporaryPassword),
                    'is_otp' => true,
                    'password_expires_at' => $expirationTime,
                ]);

                Notification::route('mail', $record->email)
                    ->notify(new Otp($record, $temporaryPassword));

                FilamentNotification::make()
                    ->title(trans('user::otp.actions.send_otp_success'))
                    ->success()
                    ->send();
            })
            ->requiresConfirmation()
            ->modalHeading(trans('user::otp.actions.send_otp'))
            ->modalSubheading(trans('user::otp.actions.confirm_otp'))
            ->modalButton(trans('user::otp.actions.yes_send_otp'));
    }

    public static function getDefaultName(): ?string
    {
        return 'send_otp';
    }
}
