<?php
/**
 * --.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class DomainsRelationManager extends RelationManager
{
    protected static string $relationship = 'domains';

    public function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Forms\Components\TextInput::make('domain')
                        ->required()
                        ->label('Subdomain')
                        ->prefix('http(s)://')
                        ->suffix('.'.request()->getHost())
                        ->maxLength(255),
                ]
            );
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('domain')
            ->columns(
                [
                    Tables\Columns\TextColumn::make('domain')->label('Subdomain'),
                    Tables\Columns\TextColumn::make('full-domain')->label('Full Domain')->getStateUsing(static fn ($record) => \Str::of($record->domain)->append('.')->append(request()->getHost())),
                ]
            )
            ->filters(
                [
                ]
            )
            ->headerActions(
                [
                    Tables\Actions\CreateAction::make(),
                ]
            )
            ->actions(
                [
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
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
}
