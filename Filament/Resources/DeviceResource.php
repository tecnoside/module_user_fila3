<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\DeviceResource\Pages;
use Modules\User\Filament\Resources\DeviceResource\RelationManagers;
use Modules\User\Models\Device;
use Modules\Xot\Filament\Resources\XotBaseResource;

class DeviceResource extends XotBaseResource
{
    protected static ?string $model = Device::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('mobile_id'),
                TextColumn::make('languages'),
                TextColumn::make('device'),
                TextColumn::make('platform'),
                TextColumn::make('browser'),
                TextColumn::make('version'),
                TextColumn::make('is_robot'),
                TextColumn::make('robot'),
                TextColumn::make('is_desktop'),
                TextColumn::make('is_mobile'),
                TextColumn::make('is_tablet'),
                TextColumn::make('is_phone'),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\UsersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDevices::route('/'),
            'create' => Pages\CreateDevice::route('/create'),
            'edit' => Pages\EditDevice::route('/{record}/edit'),
        ];
    }
}
