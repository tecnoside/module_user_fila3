<?php

namespace Modules\User\Filament\Resources;

use Modules\User\Filament\Resources\ProjectResource\Pages;
use Modules\User\Filament\Resources\ProjectResource\RelationManagers;
use Modules\User\Models\Project;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Savannabits\FilamentModules\Concerns\ContextualResource;

class ProjectResource extends Resource
{
    use ContextualResource;
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\Textarea::make('description'),
            Forms\Components\DatePicker::make('start_date')->format('Y-m-d')->displayFormat('m/d/Y'),
            Forms\Components\DatePicker::make('deadline')->format('Y-m-d')->displayFormat('m/d/Y'),
            Forms\Components\BelongsToSelect::make('user_id')->relationship('user', 'name')
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('start_date'),
                Tables\Columns\TextColumn::make('deadline'),
                Tables\Columns\TextColumn::make('user.name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
        
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }    
}
