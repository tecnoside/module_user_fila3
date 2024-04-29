<?php
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\User\Filament\Actions\Profile;

use Illuminate\Support\Arr;
use Modules\User\Models\User;
use Modules\Xot\Datas\XotData;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Validation\Rules\Password;
use Modules\Xot\Contracts\ProfileContract;

class ChangeProfilePasswordAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->translateLabel()
            //->label('user::user.actions.change_password')
            ->label('')
            ->tooltip(__('user::user.actions.change_password'))
            ->icon('heroicon-o-key')
            ->action(
                static function (ProfileContract $record, array $data): void {
                    $user=$record->user;
                    $profile_data=Arr::except($record->toArray(),['id']);
                    if($user==null){
                        $user_class=XotData::make()->getUserClass();
                        $user=$user_class::firstWhere(['email'=>$record->email]);
                    }
                    
                    if($user==null){
                        $user=$record->user()->create($profile_data);
                    }
                    $user->profile()->save($record);
                    
                    
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
