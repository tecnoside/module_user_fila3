<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use ArtMin96\FilamentJet\FilamentJet;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\TeamResource\Pages\CreateTeam;
use Modules\User\Filament\Resources\TeamResource\Pages\EditTeam;
use Modules\User\Filament\Resources\TeamResource\Pages\ListTeams;
use Modules\User\Filament\Resources\TeamResource\Pages\ViewTeam;
use Modules\User\Filament\Resources\TeamResource\RelationManagers\UsersRelationManager;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Savannabits\FilamentModules\Concerns\ContextualResource;

class TeamResource extends Resource
{
    // ////use ContextualResource;
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Teams';

    protected static ?string $slug = 'teams';

    protected static ?string $navigationGroup = 'Admin';

    public static function getModel(): string
    {
        // return FilamentJet::teamModel();
        return Team::class;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                'name' => TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                // 'role'=>Forms\Components\Select::make('role')
                //    ->options(Role::all()->pluck('name', 'name')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                'id' => TextColumn::make('id'),
                'name' => TextColumn::make('name'),
                // Tables\Columns\TextColumn::make('role'),
            ])
            ->filters([
            ])
            ->headerActions([
                // 'create' => Tables\Actions\CreateAction::make(),
                // Tables\Actions\AssociateAction::make(),
                // Tables\Actions\AttachAction::make()

                // ->form(fn (Tables\Actions\AttachAction $action): array => [
                //     $action->getRecordSelect(),
                //     // Forms\Components\TextInput::make('role')->required(),
                //     Forms\Components\Select::make('role_id')
                //         ->options(Role::all()->pluck('name', 'id'))
                // ])
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DissociateAction::make(),
                DetachAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DissociateBulkAction::make(),
                // Tables\Actions\DetachBulkAction::make(),
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => ListTeams::route('/'),
            'create' => CreateTeam::route('/create'),
            'view' => ViewTeam::route('/{record}'),
            'edit' => EditTeam::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }
}
