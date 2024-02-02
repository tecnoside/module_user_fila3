<?php
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\User\Filament\Actions;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Modules\User\Models\Role;
use Modules\User\Models\User;

class ChangePasswordAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'changePassword';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->translateLabel()
            ->label('user::user.actions.change_password')
            ->icon('heroicon-o-key')
            ->action(
                function (User $user, array $data): void {
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
                    ->rule('required', fn ($get): bool => (bool) $get('new_password'))
                    ->same('new_password'),
                ]
            );

        // ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR)
        // ->modalSubmitActionLabel(trans('camping::operation.actions.save'))
    }
}

/*
Action::make('changePassword')
                    ->action(function (User $user, array $data): void {
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
