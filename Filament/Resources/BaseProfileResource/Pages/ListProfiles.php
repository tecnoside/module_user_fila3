<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\User\Filament\Actions\Profile\ChangeProfilePasswordAction;
use Modules\User\Filament\Resources\BaseProfileResource;

class ListProfiles extends ListRecords
{
    protected static string $resource = BaseProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            ChangeProfilePasswordAction::make(),
            Tables\Actions\EditAction::make()->label('')->tooltip(__('ui:txt.edit')),
            Tables\Actions\ViewAction::make()->label('')->tooltip(__('ui:txt.view')),
            Tables\Actions\DeleteAction::make()->label('')->tooltip(__('ui:txt.delete')),
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('user.name')->label('User Name'),
            TextColumn::make('email'),
            TextColumn::make('first_name'),
            TextColumn::make('last_name'),
            TextColumn::make('email'),
            TextColumn::make('credits'),
            SpatieMediaLibraryImageColumn::make('photo_profile')
                ->collection('photo_profile'),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
                /*
                Tables\Actions\BulkAction::make('refresh-profiles')
                    ->requiresConfirmation()
                    ->action(function (Collection $records) {
                        $users = User::all();

                        foreach ($users as $user) {
                            Profile::firstOrCreate(
                                ['user_id' => $user->id, 'email' => $user->email],
                                ['credits' => 1000]
                            );
                        }
                    }),
                */
            ]),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            // ->query($this->getTableQuery())
            ->actions($this->getTableActions())
            // ->actionsColumnLabel($this->getTableActionsColumnLabel())
            // ->checkIfRecordIsSelectableUsing($this->isTableRecordSelectable())
            ->columns($this->getTableColumns())
            // ->columnToggleFormColumns($this->getTableColumnToggleFormColumns())
            // ->columnToggleFormMaxHeight($this->getTableColumnToggleFormMaxHeight())
            // ->columnToggleFormWidth($this->getTableColumnToggleFormWidth())
            // ->content($this->getTableContent())
            // ->contentFooter($this->getTableContentFooter())
            // ->contentGrid($this->getTableContentGrid())
            // ->defaultSort($this->getDefaultTableSortColumn(), $this->getDefaultTableSortDirection())
            // ->deferLoading($this->isTableLoadingDeferred())
            // ->description($this->getTableDescription())
            // ->deselectAllRecordsWhenFiltered($this->shouldDeselectAllRecordsWhenTableFiltered())
            // ->emptyState($this->getTableEmptyState())
            // ->emptyStateActions($this->getTableEmptyStateActions())
            // ->emptyStateDescription($this->getTableEmptyStateDescription())
            // ->emptyStateHeading($this->getTableEmptyStateHeading())
            // ->emptyStateIcon($this->getTableEmptyStateIcon())
            // ->filters($this->getTableFilters())
            // ->filtersFormMaxHeight($this->getTableFiltersFormMaxHeight())
            // ->filtersFormWidth($this->getTableFiltersFormWidth())
            // ->groupedBulkActions($this->getTableBulkActions())
            ->bulkActions($this->getTableBulkActions());
        // ->header($this->getTableHeader())
        // ->headerActions($this->getTableHeaderActions())
        // ->modelLabel($this->getTableModelLabel())
        // ->paginated($this->isTablePaginationEnabled())
        // ->paginatedWhileReordering($this->isTablePaginationEnabledWhileReordering())
        // ->paginationPageOptions($this->getTableRecordsPerPageSelectOptions())
        // ->persistFiltersInSession($this->shouldPersistTableFiltersInSession())
        // ->persistSearchInSession($this->shouldPersistTableSearchInSession())
        // ->persistColumnSearchesInSession($this->shouldPersistTableColumnSearchInSession())
        // ->persistSortInSession($this->shouldPersistTableSortInSession())
        // ->pluralModelLabel($this->getTablePluralModelLabel())
        // ->poll($this->getTablePollingInterval())
        // ->recordAction($this->getTableRecordActionUsing())
        // ->recordClasses($this->getTableRecordClassesUsing())
        // ->recordTitle(fn (Model $record): ?string => $this->getTableRecordTitle($record))
        // ->recordUrl($this->getTableRecordUrlUsing())
        // ->reorderable($this->getTableReorderColumn())
        // ->selectCurrentPageOnly($this->shouldSelectCurrentPageOnly())
        // ->striped($this->isTableStriped())
    }
}
