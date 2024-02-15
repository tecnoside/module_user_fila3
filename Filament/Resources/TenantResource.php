<?php

declare(strict_types=1);

/**
 * @see https://github.com/savannabits/filament-tenancy-starter/blob/main/app/Filament/Resources/TenantResource.php
 */

namespace Modules\User\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\TenantResource\Pages;
use Modules\User\Filament\Resources\TenantResource\RelationManagers;
use Modules\Xot\Datas\XotData;

class TenantResource extends Resource
{
    // protected static ?string $model = Tenant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModel(): string
    {
        // return FilamentJet::teamModel();
        // return Team::class;
        $xot = XotData::make();

        return $xot->getTenantClass();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Forms\Components\Section::make(
                        [
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->unique(table: 'tenants', ignoreRecord: true)->live(onBlur: true)
                                ->afterStateUpdated(
                                    static function (Forms\Set $set, $state): void {
                                        $set('id', $slug = \Str::of($state)->slug('_')->toString());
                                        $set('domain', \Str::of($state)->slug()->toString());
                                    }
                                )->columnSpanFull(),
                            Forms\Components\TextInput::make('id')
                                ->label('Unique ID')
                                ->required()
                                ->disabled(static fn ($context) => 'create' !== $context)
                                ->unique(table: 'tenants', ignoreRecord: true),
                            Forms\Components\TextInput::make('domain')
                                ->label('Sub-Domain')
                                ->required()
                                ->visible(static fn ($context) => 'create' === $context)
                                ->unique(table: 'domains', ignoreRecord: true)
                                ->prefix('https://')
                                ->suffix('.'.request()->getHost()),
                            Forms\Components\TextInput::make('email')->email(),
                            Forms\Components\TextInput::make('phone')->tel(),
                            Forms\Components\TextInput::make('mobile')->tel(),
                            Forms\Components\ColorPicker::make('primary_color'),
                            Forms\Components\ColorPicker::make('secondary_color'),
                        ]
                    )->columns(),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(
                [
                    Tables\Columns\TextColumn::make('id')->label('ID')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('name'),
                ]
            )
            ->filters(
                [
                    
                ]
            )
            ->actions(
                [
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]
            )
            ->bulkActions(
                [
                    Tables\Actions\BulkActionGroup::make(
                        [
                            Tables\Actions\DeleteBulkAction::make(),
                        ]
                    ),
                ]
            );
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\DomainsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTenants::route('/'),
            'create' => Pages\CreateTenant::route('/create'),
            'view' => Pages\ViewTenant::route('/{record}'),
            'edit' => Pages\EditTenant::route('/{record}/edit'),
        ];
    }
}
