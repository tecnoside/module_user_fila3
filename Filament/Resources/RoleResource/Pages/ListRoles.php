<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;
use Modules\User\Filament\Resources\RoleResource;
use Modules\User\Models\Role;

class ListRoles extends ListRecords
{
    protected static string $resource = RoleResource::class;

    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    protected function getTableHeaderActions(): array
    {
        return [
            TableLayoutToggleTableAction::make(),
            // 'create' => Tables\Actions\CreateAction::make(),
            // Tables\Actions\AssociateAction::make(),
            // Tables\Actions\AttachAction::make()

            // ->form(fn (Tables\Actions\AttachAction $action): array => [
            //     $action->getRecordSelect(),
            //     // Forms\Components\TextInput::make('role')->required(),
            //     Forms\Components\Select::make('role_id')
            //         ->options(Role::all()->pluck('name', 'id'))
            // ])
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getGridTableColumns(): array
    {
        return [
            Stack::make([
                'id' => TextColumn::make('id')->searchable()->sortable(),
                'name' => TextColumn::make('name')->searchable()->sortable(),
                // Tables\Columns\TextColumn::make('role'),
            ]),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id'),
            'name' => TextColumn::make('name'),
            // Tables\Columns\TextColumn::make('role'),
        ];
    }

    public function getTableFilters(): array
    {
        return [
        ];
    }

    public function getTableActions(): array
    {
        return [
            ViewAction::make()
                ->label(''),
            EditAction::make()
                ->label(''),
            DeleteAction::make()
                ->label('')
                ->requiresConfirmation(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            // ->columns($this->getTableColumns())
            ->columns($this->layoutView->getTableColumns())
            ->contentGrid($this->layoutView->getTableContentGrid())
            ->headerActions($this->getTableHeaderActions())

            ->filters($this->getTableFilters())
            ->filtersLayout(FiltersLayout::AboveContent)
            ->persistFiltersInSession()
            ->actions($this->getTableActions())
            ->bulkActions($this->getTableBulkActions())
            ->actionsPosition(ActionsPosition::BeforeColumns)
            ->defaultSort(
                column: 'created_at',
                direction: 'DESC',
            );
    }
}
