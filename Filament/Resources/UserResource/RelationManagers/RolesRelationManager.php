<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class RolesRelationManager extends RelationManager
{
    protected static string $relationship = 'roles';

    protected static ?string $recordTitleAttribute = 'name';
    // protected static ?string $inverseRelationship = 'section'; // Since the inverse related model is `Category`, this is normally `category`, not `section`.

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //    dddx('a');
    // }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                /*
                Forms\Components\Select::make('team_id')
                    ->relationship('teams', 'name'),
                */
            ]);
    }

    public function table(Table $table): Table
    {
        $xot = XotData::make();

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('team_id'),
            ])
            ->filters([
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make()
                    // ->mutateFormDataUsing(function (array $data): array {
                    //     // This is the test.
                    //     $data['team_id'] = 2;
                    //     return $data;
                    // }),
                    ->form(fn (Tables\Actions\AttachAction $attachAction): array => [
                        $attachAction->getRecordSelect(),
                        // Forms\Components\TextInput::make('team_id')->required(),
                        Forms\Components\Select::make('team_id')
                            ->options($xot->getTeamClass()::get()->pluck('name', 'id')),
                        // ->options(function($item){
                        //     dddx($this);
                        // })
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
