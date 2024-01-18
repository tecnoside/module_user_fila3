<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Form;
use Modules\Xot\Datas\XotData;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\EditTenantProfile as BaseEditTenantProfile;
use Modules\Xot\Datas\XotData;

class EditTenantProfile extends BaseEditTenantProfile
{
    public static function getLabel(): string
    {
        return __('user::tenancy.navigation.edit');
    }

    public function form(Form $form): Form
    {
<<<<<<< HEAD
        $resource = XotData::make()->getTenantResourceClass();

=======
        $resource=XotData::make()->getTenantResourceClass();
>>>>>>> 2bb7eaf (up)
        return $resource::form($form);
        /*
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('user::tenancy.fields.name')
                    ->translateLabel(),
                TextInput::make('phone')
                    ->required()
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->label('user::tenancy.fields.phone')
                    ->translateLabel(),
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->label('user::tenancy.fields.email')
                    ->translateLabel(),
            ]);
        */
    }
}
