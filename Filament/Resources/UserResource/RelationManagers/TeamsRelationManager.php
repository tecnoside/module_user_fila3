<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TeamsRelationManager extends RelationManager
{
    protected static string $relationship = 'teams';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                ]
            );
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns(
                [
                TextColumn::make('id'),
                TextColumn::make('name'),
                ]
            )
            ->filters(
                [
                ]
            )
            ->headerActions(
                [
                // Tables\Actions\CreateAction::make(),
                AttachAction::make(),
                ]
            )
            ->actions(
                [
                EditAction::make(),
                // DeleteAction::make(),
                DetachAction::make(),
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
                CreateAction::make(),
                ]
            );
    }
}
