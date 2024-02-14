<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\RoleResource\Pages;
use Modules\User\Filament\Resources\RoleResource\RelationManagers;
use Modules\Xot\Filament\Resources\XotBaseResource;

class RoleResource extends XotBaseResource
{
    // ////
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    'name' => TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    // 'role'=>Forms\Components\Select::make('role')
                    //    ->options(Role::all()->pluck('name', 'name')),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(
                [
                    'id' => TextColumn::make('id'),
                    'name' => TextColumn::make('name'),
                    // Tables\Columns\TextColumn::make('role'),
                ]
            )
            ->filters(
                [
                ]
            )
            ->headerActions(
                [
                    // 'create' => Tables\Actions\CreateAction::make(),
                    // Tables\Actions\AssociateAction::make(),
                    // Tables\Actions\AttachAction::make()

                    // ->form(fn (Tables\Actions\AttachAction $action): array => [
                    //     $action->getRecordSelect(),
                    //     // Forms\Components\TextInput::make('role')->required(),
                    //     Forms\Components\Select::make('role_id')
                    //         ->options(Role::all()->pluck('name', 'id'))
                    // ])
                ]
            )
            ->actions(
                [
                    ViewAction::make(),
                    EditAction::make(),
                    // Tables\Actions\EditAction::make(),
                    // Tables\Actions\DissociateAction::make(),
                    // DetachAction::make(),
                    // Tables\Actions\DeleteAction::make(),
                ]
            )
            ->bulkActions(
                [
                    // Tables\Actions\DissociateBulkAction::make(),
                    // Tables\Actions\DetachBulkAction::make(),
                    // Tables\Actions\DeleteBulkAction::make(),
                ]
            );
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\UsersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'view' => Pages\ViewRole::route('/{record}'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }

<<<<<<< HEAD
=======
    public static function getModel(): string
    {
        return Utils::getRoleModel();
    }

    /*
    public static function canGloballySearch(): bool
    {
        return Utils::isResourceGloballySearchable() && count(static::getGloballySearchableAttributes()) && static::canViewAny();
    }
    */
    /*--------------------------------*
    | Resource Related Logic Start     |
    *----------------------------------*/

    public static function getResourceEntitiesSchema(): array
    {
        return [];
    }

    public static function getResourceEntityPermissionsSchema(array $entity): ?array
    {
        return collect(Utils::getResourcePermissionPrefixes($entity['fqcn']))->reduce(
            function (array $permissions, string $permission) use ($entity): array {
                $permissions[] = Checkbox::make($permission.'_'.$entity['resource'])
                    ->label(FilamentShield::getLocalizedResourcePermissionLabel($permission))
                    ->extraAttributes(['class' => 'text-primary-600'])
                    ->afterStateHydrated(
                        function (Set $set, Get $get, $record) use ($entity, $permission): void {
                            if ($record === null) {
                                return;
                            }

                            $set($permission.'_'.$entity['resource'], $record->checkPermissionTo($permission.'_'.$entity['resource']));
                            static::refreshResourceEntityStateAfterHydrated($record, $set, $entity);
                            static::refreshSelectAllStateViaEntities($set, $get);
                        }
                    )
                    ->reactive()
                    ->afterStateUpdated(
                        function (Set $set, Get $get, $state) use ($entity): void {
                            static::refreshResourceEntityStateAfterUpdate($set, $get, $entity);
                            if (! $state) {
                                $set($entity['resource'], false);
                                $set('select_all', false);
                            }

                            static::refreshSelectAllStateViaEntities($set, $get);
                        }
                    )
                    ->dehydrated(fn ($state): bool => $state);

                return $permissions;
            }, collect()
        );
        // ->toArray()
    }

    /*
    public static function getModelLabel(): string
    {
        return static::trans('resource.label.role');
    }


    public static function getPluralModelLabel(): string
    {
        return static::trans('resource.label.roles');
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return Utils::isResourceNavigationRegistered();
    }

    protected static function getNavigationGroup(): ?string
    {
        return Utils::isResourceNavigationGroupEnabled()
            ? static::trans('nav.group')
            : '';
    }

    protected static function getNavigationLabel(): string
    {
        return static::trans('nav.role.label');
    }

    protected static function getNavigationIcon(): string
    {
        return static::trans('nav.role.icon');
    }

    protected static function getNavigationSort(): ?int
    {
        return Utils::getResourceNavigationSort();
    }

    public static function getSlug(): string
    {
        return Utils::getResourceSlug();
    }
    */

>>>>>>> 2a8c136 (Dusting)
    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }
<<<<<<< HEAD
=======

    // public function refreshSelectAllStateViaEntities(\Closure $set, \Closure $get): void
    public static function refreshSelectAllStateViaEntities(Set $set, Get $get): void
    {
        $entitiesStates = collect(FilamentShield::getResources())
            ->when(Utils::isPageEntityEnabled(), fn ($entities) => $entities->merge(FilamentShield::getPages()))
            ->when(Utils::isWidgetEntityEnabled(), fn ($entities) => $entities->merge(FilamentShield::getWidgets()))
            ->when(Utils::isCustomPermissionEntityEnabled(), fn ($entities) => $entities->merge(static::getCustomEntities()))
            ->map(
                function ($entity) use ($get): bool {
                    if (\is_array($entity)) {
                        return (bool) $get($entity['resource']);
                    }

                    return (bool) $get($entity);
                }
            );

        if ($entitiesStates->containsStrict(false) === false) {
            $set('select_all', true);
        }

        if ($entitiesStates->containsStrict(false) === true) {
            $set('select_all', false);
        }
    }

    // private function refreshEntitiesStatesViaSelectAll(\Closure $set, $state): void
    public static function refreshEntitiesStatesViaSelectAll(Set $set, $state): void
    {
        collect(FilamentShield::getResources())->each(
            function (array $entity) use ($set, $state): void {
                $set($entity['resource'], $state);
                collect(Utils::getResourcePermissionPrefixes($entity['fqcn']))->each(
                    function (string $permission) use ($entity, $set, $state): void {
                        $set($permission.'_'.$entity['resource'], $state);
                    }
                );
            }
        );

        collect(FilamentShield::getPages())->each(
            function ($page) use ($set, $state): void {
                if (Utils::isPageEntityEnabled()) {
                    $set($page, $state);
                }
            }
        );

        collect(FilamentShield::getWidgets())->each(
            function ($widget) use ($set, $state): void {
                if (Utils::isWidgetEntityEnabled()) {
                    $set($widget, $state);
                }
            }
        );

        static::getCustomEntities()->each(
            function ($custom) use ($set, $state): void {
                if (Utils::isCustomPermissionEntityEnabled()) {
                    $set($custom, $state);
                }
            }
        );
    }

    private function refreshResourceEntityStateAfterUpdate(\Closure $set, \Closure $get, array $entity): void
    {
        $collection = collect(Utils::getResourcePermissionPrefixes($entity['fqcn']))
            ->map(fn (string $permission): bool => (bool) $get($permission.'_'.$entity['resource']));

        if (! $collection->containsStrict(false)) {
            $set($entity['resource'], true);
        }

        if ($collection->containsStrict(false)) {
            $set($entity['resource'], false);
        }
    }

    private function refreshResourceEntityStateAfterHydrated(Model $model, \Closure $set, array $entity): void
    {
        $entities = $model->permissions->pluck('name')
            ->reduce(
                function (array $roles, $role): array {
                    $roles[$role] = Str::afterLast($role, '_');

                    return $roles;
                }, collect()
            )
            ->values()
            ->groupBy(fn ($item) => $item)->map->count()
            ->reduce(
                function (array $counts, $role, $key) use ($entity): array {
                    $count = is_countable(Utils::getResourcePermissionPrefixes($entity['fqcn'])) ? \count(Utils::getResourcePermissionPrefixes($entity['fqcn'])) : 0;
                    $counts[$key] = $role > 1 && $role === $count;

                    return $counts;
                }, []
            );

        // set entity's state if one are all permissions are true
        if (Arr::exists($entities, $entity['resource']) && Arr::get($entities, $entity['resource'])) {
            $set($entity['resource'], true);
        } else {
            $set($entity['resource'], false);
            $set('select_all', false);
        }
    }

    /*--------------------------------*
    | Resource Related Logic End       |
    *----------------------------------*/

    /*--------------------------------*
    | Page Related Logic Start       |
    *----------------------------------*/

    public static function getPageEntityPermissionsSchema(): array
    {
        return [];
    }

    /*--------------------------------*
    | Page Related Logic End          |
    *----------------------------------*/

    /*--------------------------------*
    | Widget Related Logic Start       |
    *----------------------------------*/

    public static function getWidgetEntityPermissionSchema(): ?array
    {
        return [];
    }

    /*--------------------------------*
    | Widget Related Logic End          |
    *----------------------------------*/

    public static function getCustomEntities(): ?Collection
    {
        return collect();
    }

    public static function getCustomEntitiesPermisssionSchema(): ?array
    {
        return collect(static::getCustomEntities())->reduce(
            function (array $customEntities, $customPermission): array {
                $customEntities[] = Grid::make()
                    ->schema(
                        [
                            Checkbox::make($customPermission)
                                ->label(Str::of($customPermission)->headline())
                                ->inline()
                                ->afterStateHydrated(
                                    function (Set $set, Get $get, $record) use ($customPermission): void {
                                        if ($record === null) {
                                            return;
                                        }

                                        $set($customPermission, $record->checkPermissionTo($customPermission));
                                        static::refreshSelectAllStateViaEntities($set, $get);
                                    }
                                )
                                ->reactive()
                                ->afterStateUpdated(
                                    function (Set $set, Get $get, $state): void {
                                        if (! $state) {
                                            $set('select_all', false);
                                        }

                                        static::refreshSelectAllStateViaEntities($set, $get);
                                    }
                                )
                                ->dehydrated(fn ($state): bool => $state),
                        ]
                    )
                    ->columns(1)
                    ->columnSpan(1);

                return $customEntities;
            }, []
        );
    }
>>>>>>> 2a8c136 (Dusting)
}
