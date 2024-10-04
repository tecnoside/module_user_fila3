<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Modules\User\Filament\Resources\RoleResource\Pages;
use Modules\User\Filament\Resources\RoleResource\RelationManagers;
use Modules\Xot\Filament\Resources\XotBaseResource;

class RoleResource extends XotBaseResource
{
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    'name' => TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    // 'role'=>Forms\Components\Select::make('role')
                    //    ->options(Role::all()->pluck('name', 'name')),
                ]
            );
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'view' => Pages\ViewRole::route('/{record}'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }
}
