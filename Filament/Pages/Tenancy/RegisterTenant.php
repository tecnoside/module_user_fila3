<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant as BaseRegisterTenant;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Contracts\TenantContract;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

class RegisterTenant extends BaseRegisterTenant
{
    public static function getLabel(): string
    {
        return __('user::tenancy.navigation.register');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema(
                [
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
                ]
            );
    }

    /**
     * @param array<string, mixed> $data
     */
    protected function handleRegistration(array $data): Model
    {
        $tenantClass = XotData::make()->getTenantClass();

        $tenant = $tenantClass::create($data);
        Assert::implementsInterface($tenant, TenantContract::class);

        $tenant->users()->attach(auth()->user());
        // $tenant->members()->attach(auth()->user());

        return $tenant;
    }
}
