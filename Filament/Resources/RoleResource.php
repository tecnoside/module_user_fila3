<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\RoleResource\Pages;
use Modules\User\Filament\Resources\RoleResource\RelationManagers;
use Modules\Xot\Filament\Resources\XotBaseResource;

class RoleResource extends XotBaseResource
{
    // ////
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns(
                [
                    'id' => TextColumn::make('id'),
                    'name' => TextColumn::make('name'),
                    // Tables\Columns\TextColumn::make('role'),
                ]
            )
            ->filters(
                [
                ]
            )
            ->headerActions(
                [
                    // 'create' => Tables\Actions\CreateAction::make(),
                    // Tables\Actions\AssociateAction::make(),
                    // Tables\Actions\AttachAction::make()

                    // ->form(fn (Tables\Actions\AttachAction $action): array => [
                    //     $action->getRecordSelect(),
                    //     // Forms\Components\TextInput::make('role')->required(),
                    //     Forms\Components\Select::make('role_id')
                    //         ->options(Role::all()->pluck('name', 'id'))
                    // ])
                ]
            )
            ->actions(
                [
                    ViewAction::make(),
                    EditAction::make(),
                    // Tables\Actions\EditAction::make(),
                    // Tables\Actions\DissociateAction::make(),
                    // DetachAction::make(),
                    // Tables\Actions\DeleteAction::make(),
                ]
            )
            ->bulkActions(
                [
                    // Tables\Actions\DissociateBulkAction::make(),
                    // Tables\Actions\DetachBulkAction::make(),
                    // Tables\Actions\DeleteBulkAction::make(),
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