<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\SocialProviderResource\Pages;
use Modules\User\Models\SocialProvider;

class SocialProviderResource extends Resource
{
    protected static ?string $model = SocialProvider::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Toggle::make('active'),
            ]);
    }

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->columns([
    //             Tables\Columns\TextColumn::make('name'),
    //             // Tables\Columns\TextColumn::make('scopes'),
    //             // Tables\Columns\TextColumn::make('parameters'),
    //             Tables\Columns\IconColumn::make('stateless')->boolean(),
    //             Tables\Columns\IconColumn::make('active')->boolean(),
    //             Tables\Columns\IconColumn::make('socialite')->boolean(),
    //             /*
    //             Tables\Columns\TextColumn::make('svg'),
    //             Tables\Columns\TextColumn::make('created_at')
    //                 ->dateTime(),
    //             Tables\Columns\TextColumn::make('updated_at')
    //                 ->dateTime(),
    //             Tables\Columns\TextColumn::make('created_by'),
    //             Tables\Columns\TextColumn::make('updated_by'),
    //             */
    //         ])
    //         ->filters([
    //         ])
    //         ->actions([
    //             Tables\Actions\ViewAction::make(),
    //             Tables\Actions\EditAction::make(),
    //         ])
    //         ->bulkActions([
    //             Tables\Actions\BulkActionGroup::make([
    //                 Tables\Actions\DeleteBulkAction::make(),
    //             ]),
    //         ]);
    // }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocialProviders::route('/'),
            'create' => Pages\CreateSocialProvider::route('/create'),
            'view' => Pages\ViewSocialProvider::route('/{record}'),
            'edit' => Pages\EditSocialProvider::route('/{record}/edit'),
        ];
    }
}
