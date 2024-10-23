<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\RelationManagers;

use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;
use Modules\Xot\Filament\Traits\TransTrait;

class UsersRelationManager extends RelationManager
{
    use TransTrait;

    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    protected static string $relationship = 'users';

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * Define the form configuration.
     */
    public function form(Form $form): Form
    {
        return $form->schema($this->getFormSchema());
    }

    /**
     * Define the form schema in a separate function.
     */
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label(__('tenant.name'))
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->label(__('tenant.email'))
                ->email()
                ->required()
                ->maxLength(255),
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

    public function getGridTableColumns(): array
    {
        return [Stack::make($this->getListTableColumns()),
        ];
    }

    /**
     * Define the table columns in a separate function.
     */
    protected function getListTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->label(__('tenant.name'))
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('email')
                ->label(__('tenant.email'))
                ->searchable()
                ->sortable(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    /**
     * Define the header actions in a separate function.
     */
    protected function getTableHeaderActions(): array
    {
        return [
            TableLayoutToggleTableAction::make(),
            Tables\Actions\CreateAction::make()
                ->label(__('tenant.create_user'))
                ->icon('heroicon-o-plus'),
        ];
    }

    /**
     * Define the row-level actions in a separate function.
     */
    protected function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make()
                ->label(__('tenant.edit_user'))
                ->icon('heroicon-o-pencil'),
            Tables\Actions\DeleteAction::make()
                ->label(__('tenant.delete_user'))
                ->icon('heroicon-o-trash'),
        ];
    }

    /**
     * Define the bulk actions in a separate function.
     */
    protected function getTableBulkActions(): array
    {
        return [
            Tables\Actions\DeleteBulkAction::make()
                ->label(__('tenant.delete_selected'))
                ->icon('heroicon-o-trash'),
        ];
    }
}
