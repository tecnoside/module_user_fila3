<?php

declare(strict_types=1);

/**
 * @see https://github.com/savannabits/filament-tenancy-starter/blob/main/app/Filament/Resources/TenantResource.php
 */

namespace Modules\User\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Modules\User\Filament\Resources\TenantResource\Pages\CreateTenant;
use Modules\User\Filament\Resources\TenantResource\Pages\EditTenant;
use Modules\User\Filament\Resources\TenantResource\Pages\ListTenants;
use Modules\User\Filament\Resources\TenantResource\Pages\ViewTenant;
use Modules\User\Filament\Resources\TenantResource\RelationManagers;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\XotBaseResource;

class TenantResource extends XotBaseResource
{
    // protected static ?string $model = Tenant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        try {
            return (string) static::getModel()::count();
        } catch (\Exception $e) {
            return '---';
        }
    }

    public static function getModel(): string
    {
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

    public static function getRelations(): array
    {
        return [
            RelationManagers\DomainsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTenants::route('/'),
            'create' => CreateTenant::route('/create'),
            'view' => ViewTenant::route('/{record}'),
            'edit' => EditTenant::route('/{record}/edit'),
        ];
    }
}
