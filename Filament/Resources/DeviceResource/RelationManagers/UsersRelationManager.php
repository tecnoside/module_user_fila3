<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\DeviceResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    public function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                TextInput::make('device')
                    ->required()
                    ->maxLength(255),
                ]
            );
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('device')
            ->columns(
                [
                TextColumn::make('device'),
                ]
            )
            ->filters(
                [
                ]
            )
            ->headerActions(
                [
                CreateAction::make(),
                ]
            )
            ->actions(
                [
                EditAction::make(),
                DeleteAction::make(),
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
}
