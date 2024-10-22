<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\User\Filament\Resources\UserResource;
use Modules\Xot\Filament\Traits\TransTrait;

class UsersRelationManager extends RelationManager
{
    use TransTrait;

    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    protected static string $relationship = 'users';

    protected static ?string $inverseRelationship = 'roles';

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * Define the form for this relation.
     */
    public function form(Form $form): Form
    {
        return $this->getUserResourceForm($form);
    }

    /**
     * Modular function to configure the form.
     */
    protected function getUserResourceForm(Form $form): Form
    {
        // Centralize form structure using UserResource for consistency
        return UserResource::form($form);
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
                column: 'users.created_at',
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
            TextColumn::make('name')
                ->label(__('user.name'))
                ->searchable()
                ->sortable(),
            TextColumn::make('email')
                ->label(__('user.email'))
                ->searchable()
                ->sortable(),
            TextColumn::make('role')
                ->label(__('user.role')),
        ];
    }

    /**
     * Define the header actions in a separate function.
     */
    protected function getTableHeaderActions(): array
    {
        return [
            AttachAction::make()
                ->label('')
                ->tooltip(__('role.attach_user'))
                ->icon('heroicon-o-link')
            // ->icon('heroicon-o-paper-clip')
            ,
        ];
    }

    /**
     * Define the row-level actions in a separate function.
     */
    protected function getTableActions(): array
    {
        return [
            ViewAction::make()
                ->label('')
                ->tooltip(__('role.view_user'))
                ->icon('heroicon-o-eye'),
            EditAction::make()
                ->label('')
                ->tooltip(__('role.edit_user'))
                ->icon('heroicon-o-pencil'),
            DetachAction::make()
                ->label('')
                ->tooltip(__('role.detach_user'))
                ->icon('heroicon-o-link-slash'),
        ];
    }
}
