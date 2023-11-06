<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\User\Facades\FilamentShield;
use Modules\User\Filament\Resources\RoleResource\Pages\CreateRole;
use Modules\User\Filament\Resources\RoleResource\Pages\EditRole;
use Modules\User\Filament\Resources\RoleResource\Pages\ListRoles;
use Modules\User\Filament\Resources\RoleResource\Pages\ViewRole;
use Modules\User\Filament\Resources\RoleResource\RelationManagers\UsersRelationManager;
use Modules\User\Models\Role;
use Modules\User\Support\Utils;
use Modules\Xot\Filament\Resources\XotBaseResource;

class RoleResource extends XotBaseResource
{
    /* implements HasShieldPermissions */
    // ////
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    protected static ?string $recordTitleAttribute = 'name';
    // Static property Modules\User\Filament\Resources\RoleResource::$permissionsCollection is never read, only written.
    // private static ?Collection $permissionsCollection = null;

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                TextInput::make('name')
                                    ->label(static::trans('fields.name'))
                                    ->required()
                                    ->maxLength(255),
                                Select::make('team_id')
                                    ->relationship('team', 'name'),
                                TextInput::make('guard_name')
                                    ->label(static::trans('fields.guard_name'))
                                    ->default(Utils::getFilamentAuthGuard())
                                    ->nullable()
                                    ->maxLength(255),
                                Toggle::make('select_all')
                                    ->onIcon('heroicon-s-shield-check')
                                    ->offIcon('heroicon-s-shield-exclamation')
                                    ->label(static::trans('fields.select_all.name'))
                                    ->helperText(static::trans('fields.select_all.message'))
                                    ->reactive()
                                    ->afterStateUpdated(static function (Set $set, $state): void {
                                        static::refreshEntitiesStatesViaSelectAll($set, $state);
                                    })
                                    ->dehydrated(static fn ($state): bool => $state),
                            ])
                            ->columns([
                                'sm' => 2,
                                'lg' => 3,
                            ]),
                    ]),
                Tabs::make('Permissions')
                    ->tabs([
                        Tab::make(static::trans('resources'))
                            ->visible(static fn (): bool => Utils::isResourceEntityEnabled())
                            ->reactive()
                            ->schema([
                                Grid::make([
                                    'sm' => 2,
                                    'lg' => 3,
                                ])
                                    ->schema(static::getResourceEntitiesSchema())
                                    ->columns([
                                        'sm' => 2,
                                        'lg' => 3,
                                    ]),
                            ]),
                        Tab::make(static::trans('pages'))
                            // ->visible(fn (): bool => (bool) Utils::isPageEntityEnabled() && (count(FilamentShield::getPages()) > 0 ? true : false))
                            ->reactive()
                            ->schema([
                                Grid::make([
                                    'sm' => 3,
                                    'lg' => 4,
                                ])
                                    ->schema(static::getPageEntityPermissionsSchema())
                                    ->columns([
                                        'sm' => 3,
                                        'lg' => 4,
                                    ]),
                            ]),
                        Tab::make(static::trans('widgets'))
                            // ->visible(fn (): bool => (bool) Utils::isWidgetEntityEnabled() && (count(FilamentShield::getWidgets()) > 0 ? true : false))
                            ->reactive()
                            ->schema([
                                Grid::make([
                                    'sm' => 3,
                                    'lg' => 4,
                                ])
                                    ->schema(static::getWidgetEntityPermissionSchema())
                                    ->columns([
                                        'sm' => 3,
                                        'lg' => 4,
                                    ]),
                            ]),

                        Tab::make(static::trans('custom'))
                            ->visible(static fn (): bool => Utils::isCustomPermissionEntityEnabled())
                            ->reactive()
                            ->schema([
                                Grid::make([
                                    'sm' => 3,
                                    'lg' => 4,
                                ])
                                    ->schema(static::getCustomEntitiesPermisssionSchema())
                                    ->columns([
                                        'sm' => 3,
                                        'lg' => 4,
                                    ]),
                            ]),
                    ])
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                BadgeColumn::make('name')
                    ->label(static::trans('fields.name'))
                    ->formatStateUsing(static fn ($state): string => Str::headline($state))
                    ->colors(['primary'])
                    ->searchable(),
                // Tables\Columns\TextColumn::make('team_id'),
                TextColumn::make('team.name'),
                BadgeColumn::make('guard_name')
                    ->label(static::trans('fields.guard_name')),
                BadgeColumn::make('permissions_count')
                    ->label(static::trans('fields.permissions'))
                    ->counts('permissions')
                    ->colors(['success']),
                TextColumn::make('updated_at')
                    ->label(static::trans('fields.updated_at'))
                    ->dateTime(),
            ])
            ->filters([
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            UsersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRoles::route('/'),
            'create' => CreateRole::route('/create'),
            'view' => ViewRole::route('/{record}'),
            'edit' => EditRole::route('/{record}/edit'),
        ];
    }

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
        return collect(Utils::getResourcePermissionPrefixes($entity['fqcn']))->reduce(static function (array $permissions, string $permission) use ($entity): array {
            $permissions[] = Checkbox::make($permission.'_'.$entity['resource'])
                ->label(FilamentShield::getLocalizedResourcePermissionLabel($permission))
                ->extraAttributes(['class' => 'text-primary-600'])
                ->afterStateHydrated(static function (Set $set, Get $get, $record) use ($entity, $permission): void {
                    if (null === $record) {
                        return;
                    }

                    $set($permission.'_'.$entity['resource'], $record->checkPermissionTo($permission.'_'.$entity['resource']));
                    static::refreshResourceEntityStateAfterHydrated($record, $set, $entity);
                    static::refreshSelectAllStateViaEntities($set, $get);
                })
                ->reactive()
                ->afterStateUpdated(static function (Set $set, Get $get, $state) use ($entity): void {
                    static::refreshResourceEntityStateAfterUpdate($set, $get, $entity);
                    if (! $state) {
                        $set($entity['resource'], false);
                        $set('select_all', false);
                    }

                    static::refreshSelectAllStateViaEntities($set, $get);
                })
                ->dehydrated(static fn ($state): bool => $state);

            return $permissions;
        }, collect())
            // ->toArray()
        ;
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

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    // public function refreshSelectAllStateViaEntities(\Closure $set, \Closure $get): void
    public static function refreshSelectAllStateViaEntities(Set $set, Get $get): void
    {
        $entitiesStates = collect(FilamentShield::getResources())
            ->when(Utils::isPageEntityEnabled(), fn ($entities) => $entities->merge(FilamentShield::getPages()))
            ->when(Utils::isWidgetEntityEnabled(), fn ($entities) => $entities->merge(FilamentShield::getWidgets()))
            ->when(Utils::isCustomPermissionEntityEnabled(), fn ($entities) => $entities->merge(static::getCustomEntities()))
            ->map(static function ($entity) use ($get): bool {
                if (\is_array($entity)) {
                    return (bool) $get($entity['resource']);
                }

                return (bool) $get($entity);
            });

        if (false === $entitiesStates->containsStrict(false)) {
            $set('select_all', true);
        }

        if (true === $entitiesStates->containsStrict(false)) {
            $set('select_all', false);
        }
    }

    // private function refreshEntitiesStatesViaSelectAll(\Closure $set, $state): void
    public static function refreshEntitiesStatesViaSelectAll(Set $set, $state): void
    {
        collect(FilamentShield::getResources())->each(function (array $entity) use ($set, $state): void {
            $set($entity['resource'], $state);
            collect(Utils::getResourcePermissionPrefixes($entity['fqcn']))->each(function (string $permission) use ($entity, $set, $state): void {
                $set($permission.'_'.$entity['resource'], $state);
            });
        });

        collect(FilamentShield::getPages())->each(function ($page) use ($set, $state): void {
            if (Utils::isPageEntityEnabled()) {
                $set($page, $state);
            }
        });

        collect(FilamentShield::getWidgets())->each(function ($widget) use ($set, $state): void {
            if (Utils::isWidgetEntityEnabled()) {
                $set($widget, $state);
            }
        });

        static::getCustomEntities()->each(function ($custom) use ($set, $state): void {
            if (Utils::isCustomPermissionEntityEnabled()) {
                $set($custom, $state);
            }
        });
    }

    private function refreshResourceEntityStateAfterUpdate(\Closure $set, \Closure $get, array $entity): void
    {
        $collection = collect(Utils::getResourcePermissionPrefixes($entity['fqcn']))
            ->map(static fn (string $permission): bool => (bool) $get($permission.'_'.$entity['resource']));

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
            ->reduce(static function (array $roles, $role): array {
                $roles[$role] = Str::afterLast($role, '_');

                return $roles;
            }, collect())
            ->values()
            ->groupBy(static fn ($item) => $item)->map->count()
            ->reduce(static function (array $counts, $role, $key) use ($entity): array {
                $count = is_countable(Utils::getResourcePermissionPrefixes($entity['fqcn'])) ? \count(Utils::getResourcePermissionPrefixes($entity['fqcn'])) : 0;
                $counts[$key] = $role > 1 && $role === $count;

                return $counts;
            }, []);

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
        return collect(static::getCustomEntities())->reduce(static function (array $customEntities, $customPermission): array {
            $customEntities[] = Grid::make()
                ->schema([
                    Checkbox::make($customPermission)
                        ->label(Str::of($customPermission)->headline())
                        ->inline()
                        ->afterStateHydrated(static function (Set $set, Get $get, $record) use ($customPermission): void {
                            if (null === $record) {
                                return;
                            }

                            $set($customPermission, $record->checkPermissionTo($customPermission));
                            static::refreshSelectAllStateViaEntities($set, $get);
                        })
                        ->reactive()
                        ->afterStateUpdated(static function (Set $set, Get $get, $state): void {
                            if (! $state) {
                                $set('select_all', false);
                            }

                            static::refreshSelectAllStateViaEntities($set, $get);
                        })
                        ->dehydrated(static fn ($state): bool => $state),
                ])
                ->columns(1)
                ->columnSpan(1);

            return $customEntities;
        }, []);
    }
}
