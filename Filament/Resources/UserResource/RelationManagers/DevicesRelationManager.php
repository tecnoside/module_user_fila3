<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\DeviceResource;

class DevicesRelationManager extends RelationManager
{
    protected static string $relationship = 'devices';

    public static function extendTableCallback(): array
    {
        return [
            'login_at' => TextColumn::make('login_at'),
            'logout_at' => TextColumn::make('logout_at'),
        ];
    }

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
        $table = DeviceResource::table($table);

        $columns = array_merge($table->getColumns(), static::extendTableCallback());

        $table = $table->columns($columns);

        return $table;
    }
}
