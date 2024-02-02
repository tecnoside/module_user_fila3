<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Form;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\DeviceResource\Pages\CreateDevice;
use Modules\User\Filament\Resources\DeviceResource\Pages\EditDevice;
use Modules\User\Filament\Resources\DeviceResource\Pages\ListDevices;
use Modules\User\Filament\Resources\DeviceResource\RelationManagers\UsersRelationManager;
use Modules\User\Models\Device;
use Modules\Xot\Filament\Resources\XotBaseResource;

class DeviceResource extends XotBaseResource
{
    protected static ?string $model = Device::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(
                [
                    TextColumn::make('id'),
                    TextColumn::make('mobile_id'),
                    // TextColumn::make('languages'),
                    TextColumn::make('device'),
                    TextColumn::make('platform'),
                    TextColumn::make('browser'),
                    TextColumn::make('version'),
                    IconColumn::make('is_robot')->boolean(),
                    TextColumn::make('robot'),
                    IconColumn::make('is_desktop')->boolean(),
                    IconColumn::make('is_mobile')->boolean(),
                    IconColumn::make('is_tablet')->boolean(),
                    IconColumn::make('is_phone')->boolean(),
                    // ...static::extendTableCallback(),
                ]
            )
            ->filters(
                [
                ]
            )
            ->actions(
                [
                    EditAction::make(),
                ]
            )
            ->bulkActions(
                [
                    BulkActionGroup::make(
                        [
                            DeleteBulkAction::make(),
                        ]
                    ),
                ]
            )
            ->emptyStateActions(
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
}
