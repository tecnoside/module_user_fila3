<?php
/**
 * --.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions as TableActions;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;
use Modules\User\Filament\Resources\TenantResource;
use Modules\User\Models\User;

class ListTenants extends ListRecords
{
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    protected static string $resource = TenantResource::class;

    protected function getTableHeaderActions(): array
    {
        return [
            TableLayoutToggleTableAction::make(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        $tenantModel = static::getModel();

        // Check if the table exists
        if (empty($tenantModel) || ! app($tenantModel)->getConnection()->getSchemaBuilder()->hasTable(app($tenantModel)->getTable())) {
            Notification::make()
            ->title(__('Attenzione'))
            ->body(__('La tabella :table non esiste', ['table' => app($tenantModel)->getTable()]))
            ->persistent()
            ->warning()
            ->send();

            return $this->configureEmptyTable($table);
        }

        return $this->configureTable($table);
    }

    protected function configureEmptyTable(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => User::query()->where('id', null))
            ->columns([
                TextColumn::make('message')
                    ->label(__('Messaggio'))
                    ->default(__('La tabella tenants non è stata impostata. Per favore, configurala.'))
                    ->html(), // This allows you to format the message if needed
            ])
            ->headerActions([]) // No actions
            ->actions([]); // No footer actions
    }

    protected function configureTable(Table $table): Table
    {
        return $table
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

    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->getListTableColumns()),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('id')->label(__('ID'))->searchable()->sortable(),
            TextColumn::make('name')->label(__('Nome')),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            // Your filters here
        ];
    }

    protected function getTableActions(): array
    {
        return [
            TableActions\ViewAction::make(),
            TableActions\EditAction::make(),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            TableActions\DeleteBulkAction::make(),
        ];
    }
}
