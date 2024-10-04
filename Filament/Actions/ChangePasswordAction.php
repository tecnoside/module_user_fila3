<?php
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\User\Filament\Actions;

use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Modules\Xot\Contracts\UserContract;

class ChangePasswordAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->translateLabel()
            ->label('user::user.actions.change_password')
            ->icon('heroicon-o-key')
            ->action(
                static function (UserContract $user, array $data): void {
                    $user->update(
                        [
                            'password' => Hash::make($data['new_password']),
                        ]
                    );
                    Notification::make()->success()->title('Password changed successfully.');
                }
            )
            ->form(
                [
                    TextInput::make('new_password')
                        ->password()
                        ->label('New Password')
                        ->required()
                        ->rule(Password::default()),
                    TextInput::make('new_password_confirmation')
                        ->password()
                        ->label('Confirm New Password')
                        ->rule('required', static fn ($get): bool => (bool) $get('new_password'))
                        ->same('new_password'),
                ]
            );
    }

    public static function getDefaultName(): ?string
    {
        return 'changePassword';
    }
}

/*
Action::make('changePassword')
                    ->action(function (UserContract $user, array $data): void {
                        $user->update([
                            'password' => Hash::make($data['new_password']),
                        ]);
                        Notification::make()->success()->title('Password changed successfully.');
                    })
                    ->form([
                        TextInput::make('new_password')
                            ->password()
                            ->label('New Password')
                            ->required()
                            ->rule(Password::default()),
                        TextInput::make('new_password_confirmation')
                            ->password()
                            ->label('Confirm New Password')
                            ->rule('required', fn ($get): bool => (bool) $get('new_password'))
                            ->same('new_password'),
                    ])
                    ->icon('heroicon-o-key')
                // ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR)
*/
