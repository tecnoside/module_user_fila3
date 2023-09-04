<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\TeamResource;
use Modules\User\Models\Role;

class TeamsRelationManager extends RelationManager
{
    protected static string $relationship = 'teams';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Form $form): Form
    {
        $form = TeamResource::form($form);
        $childComponents = [];
        foreach ($form->getSchema() as $schema) {
            $childComponents = array_merge($childComponents, $schema->getChildComponents());
        }
        $childComponents['role'] = Forms\Components\Select::make('role')
            ->options(Role::all()->pluck('name', 'name'));
        $form->schema($childComponents);

        return $form;
    }

    public function table(Table $table): Table
    {
        $table = TeamResource::table($table);

        $columns = $table->getColumns();
        $columns['role'] = Tables\Columns\TextColumn::make('role');
        $table->columns($columns);

        $headerActions = $table->getHeaderActions();
        $headerActions['attach'] = Tables\Actions\AttachAction::make()
            ->form(fn (Tables\Actions\AttachAction $action): array => [
                $action->getRecordSelect(),
                Forms\Components\Select::make('role')
                    ->options(Role::all()->pluck('name', 'name')),
            ]);
        $table->headerActions($headerActions);

        return $table;
    }
}
