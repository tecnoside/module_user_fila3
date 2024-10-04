<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;
use Modules\Tenant\Services\TenantService;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Filament\Traits\TransTrait;

/**
 * @property Forms\ComponentContainer $form
 */
class Password extends Page implements HasForms
{
    use TransTrait;
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'user::filament.pages.password';

    protected static ?int $navigationSort = 1;

    public ?array $formData = [];

    public function mount(): void
    {
        $this->fillForms();
    }

    protected function fillForms(): void
    {
        $data = PasswordData::make()->toArray();

        $this->form->fill($data);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('otp_expiration_minutes')// Durata in minuti della validità della password temporanea
                    ->numeric()
                    ->helperText(static::trans('fields.otp_expiration_minutes.help'))
                    ->default(60),
                TextInput::make('otp_length')// Lunghezza del codice OTP
                    ->helperText(static::trans('fields.otp_length.help'))
                    ->numeric(),
                TextInput::make('expires_in')
                ->helperText(static::trans('fields.expires_in.help'))
                    ->numeric(), // The number of days before the password expires.

                TextInput::make('min')
                ->helperText(static::trans('fields.min.help'))
                    ->numeric(), // = 6; // The minimum size of the password.
                Toggle::make('mixedCase')
                ->helperText(static::trans('fields.mixedCase.help')), // = false; // If the password requires at least one uppercase and one lowercase letter.
                Toggle::make('letters')
                ->helperText(static::trans('fields.letters.help')), // = false; // If the password requires at least one letter.
                Toggle::make('numbers')
                ->helperText(static::trans('fields.numbers.help')), // = false; // If the password requires at least one number.
                Toggle::make('symbols')
                ->helperText(static::trans('fields.symbols.help')), // = false; // If the password requires at least one symbol.
                Toggle::make('uncompromised')
                ->helperText(static::trans('fields.uncompromised.help')), // = false; // If the password should not have been compromised in data leaks.
                TextInput::make('compromisedThreshold')
                ->helperText(static::trans('fields.compromisedThreshold.help'))
                    ->numeric(), // = 1; // The number of times a password can appear in data leaks before being considered compromised.
            ])->columns(3)
            // ->model($this->getUser())
            ->statePath('formData');
    }

    protected function getUpdateFormActions(): array
    {
        return [
            Action::make('updateDataAction')
                ->label(__('filament-panels::pages/auth/edit-profile.form.actions.save.label'))
                ->submit('editDataForm'),
        ];
    }

    public function updateData(): void
    {
        try {
            $data = $this->form->getState();
            TenantService::saveConfig('password', $data);
            // $this->handleRecordUpdate($this->getUser(), $data);
        } catch (Halt $exception) {
            dddx($exception->getMessage());

            return;
        }
        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        return $record;
    }
}
