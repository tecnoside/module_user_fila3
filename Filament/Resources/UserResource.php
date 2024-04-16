<?php

/**
 * @see https://github.com/ryangjchandler/filament-user-resource/blob/main/src/Resources/UserResource.php
 * @see https://github.com/3x1io/filament-user/blob/main/src/Resources/UserResource.php
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Form;
use Filament\Tables\Table;
use Modules\User\Models\User;
use Illuminate\Support\HtmlString;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Filament\Resources\RelationManagers\RelationGroup;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource\Pages\EditUser;
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\User\Filament\Resources\UserResource\RelationManagers\RolesRelationManager;
use Modules\User\Filament\Resources\UserResource\RelationManagers\TeamsRelationManager;
use Modules\User\Filament\Resources\UserResource\RelationManagers\TokensRelationManager;
use Modules\User\Filament\Resources\UserResource\RelationManagers\ClientsRelationManager;
use Modules\User\Filament\Resources\UserResource\RelationManagers\DevicesRelationManager;
use Modules\User\Filament\Resources\UserResource\RelationManagers\ProfileRelationManager;

class UserResource extends XotBaseResource
{
    // protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    // Static property Modules\User\Filament\Resources\UserResource::$enablePasswordUpdates is never read, only written.
    // private static bool|\Closure $enablePasswordUpdates = true;

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    public static function getWidgets(): array
    {
        return [
            UserOverview::class,
        ];
    }

    // public static function extendForm(\Closure $callback): void
    // {
    //    static::$extendFormCallback = $callback;
    // }

    public static function form(Form $form): Form
    {
        $schema = [
            'left' => Section::make(
                [
                    'name' => TextInput::make('name')
                        ->required(),
                    'email' => TextInput::make('email')
                        ->required()
                        ->unique(ignoreRecord: true),
                    'current_team_id' => Select::make('current_team_id')
                        ->label('current team')
                        ->relationship('teams', 'name'),
                    /*
                'password' => TextInput::make('password')
                    ->required()
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->rule(Password::default()),
                */
                    'password' => TextInput::make('password')
                        // ->label(trans('filament-user::user.resource.password'))
                        ->password()
                        ->maxLength(255)
                        ->dehydrateStateUsing(
                            static fn ($state) => ! empty($state)
                            ? Hash::make($state)
                            : User::find($form->getColumns())?->password
                        ),
                    /*
                    ->dehydrateStateUsing(function ($state) use ($form){
                        if(!empty($state)){
                            return Hash::make($state);
                        }

                        $user = User::find($form->getColumns());
                        if($user){
                            return $user->password;
                        }
                    }),
                    */

                    //    ->visible(fn ($livewire): bool => $livewire instanceof CreateUser)
                    //    ->rule(Password::default()),
                    /*
                        'password_group' => Group::make([
                    'password' => TextInput::make('password')
                        ->password()
                        ->label('New Password')
                        ->nullable()
                        ->rule(Password::default())
                        ->dehydrated(false),
                    'password_confirmation' => TextInput::make('password_confirmation')
                        ->password()
                        ->label('Confirm New Password')
                        ->rule('required', fn ($get): bool => (bool) $get('password'))
                        ->same('password')
                        ->dehydrated(false),
                        ])// ->visible(static::$enablePasswordUpdates),
                        */
                ]
            )->columnSpan(8),
            'right' => Section::make(
                [
                    'created_at' => Placeholder::make('created_at')
                        ->content(static fn ($record) => $record?->created_at?->diffForHumans() ?? new HtmlString('&mdash;')),
                ]
            )->columnSpan(4),
        ];

        $form->schema($schema)->columns(12);

        return $form;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(
                [
                    TextColumn::make('id')->sortable(),
                    TextColumn::make('name')->sortable()->searchable(), // ->toggleable(),
                    TextColumn::make('email')->sortable()->searchable(),
                    // TextColumn::make('profile.first_name')->label('first name')->sortable()->searchable()->toggleable(),
                    // TextColumn::make('profile.last_name')->label('last name')->sortable()->searchable()->toggleable(),
                    TextColumn::make('teams.name')->searchable()->toggleable()->wrap()->badge(),
                    // Tables\Columns\TextColumn::make('email'),
                    // Tables\Columns\TextColumn::make('email_verified_at')
                    //    ->dateTime(config('app.date_format')),
                    TextColumn::make('role.name')->toggleable(),
                    TextColumn::make('roles.name')->toggleable()->wrap()->badge(),
                    // Tables\Columns\TextColumn::make('created_at')->dateTime(config('app.date_format')),
                    // Tables\Columns\TextColumn::make('updated_at')
                    //    ->dateTime(config('app.date_format')),
                    // Tables\Columns\TextColumn::make('role_id'),
                    // Tables\Columns\TextColumn::make('display_name'),
                    // Tables\Columns\TextColumn::make('phone_number'),
                    // Tables\Columns\TextColumn::make('phone_verified_at')
                    //    ->dateTime(config('app.date_format')),
                    // Tables\Columns\TextColumn::make('photo'),
                    BooleanColumn::make('email_verified_at')->sortable()->searchable()->toggleable(),
                    ...static::extendTableCallback(),
                ]
            )
            ->filters(
                [
                    /*
                SelectFilter::make('role')
                    ->options([
                        Role::ROLE_USER => 'User',
                        Role::ROLE_OWNER => 'Owner',
                        Role::ROLE_ADMINISTRATOR => 'Administrator',
                    ])
                    ->attribute('role_id'),
                */
                    Filter::make('verified')
                        ->label(trans('verified'))
                        ->query(static fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
                    Filter::make('unverified')
                        ->label(trans('unverified'))
                        ->query(static fn (Builder $query): Builder => $query->whereNull('email_verified_at')),
                ],
                layout: FiltersLayout::AboveContent
            )
            ->actions(
                [
                    EditAction::make(),
                    ChangePasswordAction::make(),
                    /*
                Action::make('changePassword')
                    ->action(function (User $user, array $data): void {
                        $user->update([
                            'password' => Hash::make($data['new_password']),
                        ]);
                        Notification::make()->success()->title('Password changed successfully.');
                    })
                    ->form([
                        TextInput::make('new_password')
                            ->password()
                            ->label('New Password')
                            ->required()
                            ->rule(Password::default()),
                        TextInput::make('new_password_confirmation')
                            ->password()
                            ->label('Confirm New Password')
                            ->rule('required', fn ($get): bool => (bool) $get('new_password'))
                            ->same('new_password'),
                    ])
                    ->icon('heroicon-o-key')
                // ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR)
                ,
                */
                    Action::make('deactivate')
                        ->color('danger')
                        ->icon('heroicon-o-trash')
                        ->action(static fn (User $user) => $user->delete())
                    // ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR)
                    ,
                ], position: ActionsPosition::BeforeColumns
            )

            ->bulkActions(
                [
                    DeleteBulkAction::make(),
                ]
            )
            ->defaultSort('users.created_at', 'desc');
    }

    // public static function enablePasswordUpdates(bool|Closure $condition = true): void
    // {
    //     static::$enablePasswordUpdates = $condition;
    // }

    /*
    public static function getModel(): string
    {
        return config('filament-user-resource.model');
    }
    */

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }

    public static function getRelations(): array
    {
        return [
            DevicesRelationManager::class,
            TeamsRelationManager::class,
            ProfileRelationManager::class,
            RolesRelationManager::class,
            // ---PASSPORT
            RelationGroup::make(
                'Passport',
                [
                    TokensRelationManager::class,
                    ClientsRelationManager::class,
                ]
            ),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
