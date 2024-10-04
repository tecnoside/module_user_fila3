<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Form;
use Modules\User\Filament\Resources\DeviceResource\Pages\CreateDevice;
use Modules\User\Filament\Resources\DeviceResource\Pages\EditDevice;
use Modules\User\Filament\Resources\DeviceResource\Pages\ListDevices;
use Modules\User\Filament\Resources\DeviceResource\RelationManagers\UsersRelationManager;
use Modules\User\Models\Device;
use Modules\Xot\Filament\Resources\XotBaseResource;

class DeviceResource extends XotBaseResource
{
    protected static ?string $model = Device::class;

    protected static ?string $navigationIcon = 'heroicon-o-device-phone-mobile';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                ]
            );
    }

    public static function getRelations(): array
    {
        return [
            UsersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDevices::route('/'),
            'create' => CreateDevice::route('/create'),
            'edit' => EditDevice::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }
}
