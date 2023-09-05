<?php
/**
 * @see https://github.com/ryangjchandler/filament-user-resource/blob/main/src/Resources/UserResource.php
 * @see https://github.com/3x1io/filament-user/blob/main/src/Resources/UserResource.php
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Closure;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Illuminate\Validation\Rules\Password;
use Modules\User\Filament\Resources\UserResource\Pages;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Modules\User\Filament\Resources\UserResource\RelationManagers;
use Modules\User\Filament\Resources\UserResource\Widgets;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Modules\Xot\Filament\Resources\XotBaseResource;

class UserResource extends XotBaseResource
{
    // protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static bool|Closure $enablePasswordUpdates = true;

    protected static ?Closure $extendFormCallback = null;

    /*
    protected static function getNavigationLabel(): string
    {
        return trans('filament-user::user.resource.label');
    }

    public static function getPluralLabel(): string
    {
        return trans('filament-user::user.resource.label');
    }

    public static function getLabel(): string
    {
        return trans('filament-user::user.resource.single');
    }

    protected static function getNavigationGroup(): ?string
    {
        return config('filament-user.group');
    }

    protected function getTitle(): string
    {
        return trans('filament-user::user.resource.title.resource');
    }
    */

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    public static function getWidgets(): array
    {
        return [
            Widgets\UserOverview::class,
        ];
    }

    public static function extendForm(Closure $callback): void
    {
        static::$extendFormCallback = $callback;
    }

    public static function formOld(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(),
                Forms\Components\Select::make('roles')
                    ->multiple()
                    ->relationship('roles', 'name'),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema(function () {
                $schema = [
                    'left' => Card::make([
                        'name' => TextInput::make('name')
                            ->required(),
                        'email' => TextInput::make('email')
                            ->required()
                            ->unique(ignoreRecord: true),
                        'password' => TextInput::make('password')
                            ->required()
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            /*
                            ->dehydrateStateUsing(static function ($state) use ($form){
                                if(!empty($state)){
                                    return Hash::make($state);
                                }

                                $user = User::find($form->getColumns());
                                if($user){
                                    return $user->password;
                                }
                            }),
                            */
                            ->visible(fn ($livewire): bool => $livewire instanceof CreateUser)
                            ->rule(Password::default()),
                        'new_password_group' => Group::make([
                            'new_password' => TextInput::make('new_password')
                                ->password()
                                ->label('New Password')
                                ->nullable()
                                ->rule(Password::default())
                                ->dehydrated(false),
                            'new_password_confirmation' => TextInput::make('new_password_confirmation')
                                ->password()
                                ->label('Confirm New Password')
                                ->rule('required', fn ($get): bool => (bool) $get('new_password'))
                                ->same('new_password')
                                ->dehydrated(false),
                        ])->visible(static::$enablePasswordUpdates),
                    ])->columnSpan(8),
                    'right' => Card::make([
                        'created_at' => Placeholder::make('created_at')
                            ->content(fn ($record) => $record?->created_at?->diffForHumans() ?? new HtmlString('&mdash;')),
                    ])->columnSpan(4),
                ];

                if (static::$extendFormCallback instanceof \Closure) {
                    $schema = value(static::$extendFormCallback, $schema);
                }

                return $schema;
            })
            ->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->searchable()->toggleable(),
                TextColumn::make('email')->sortable()->searchable(),
                // TextColumn::make('profile.first_name')->label('first name')->sortable()->searchable()->toggleable(),
                // TextColumn::make('profile.last_name')->label('last name')->sortable()->searchable()->toggleable(),
                TextColumn::make('teams.name')->sortable()->searchable()->toggleable(),
                // Tables\Columns\TextColumn::make('email'),
                // Tables\Columns\TextColumn::make('email_verified_at')
                //    ->dateTime(),
                TextColumn::make('role.name')->toggleable(),
                TextColumn::make('roles.name')->toggleable(),
                // Tables\Columns\TextColumn::make('created_at')->dateTime(),
                // Tables\Columns\TextColumn::make('updated_at')
                //    ->dateTime(),
                // Tables\Columns\TextColumn::make('role_id'),
                // Tables\Columns\TextColumn::make('display_name'),
                // Tables\Columns\TextColumn::make('phone_number'),
                // Tables\Columns\TextColumn::make('phone_verified_at')
                //    ->dateTime(),
                // Tables\Columns\TextColumn::make('photo'),
                BooleanColumn::make('email_verified_at')->sortable()->searchable()->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->options([
                        Role::ROLE_USER => 'User',
                        Role::ROLE_OWNER => 'Owner',
                        Role::ROLE_ADMINISTRATOR => 'Administrator',
                    ])
                    ->attribute('role_id'),
                Tables\Filters\Filter::make('verified')
                    ->label(trans('filament-user::user.resource.verified'))
                    ->query(fn (Builder $builder): Builder => $builder->whereNotNull('email_verified_at')),
                Tables\Filters\Filter::make('unverified')
                    ->label(trans('filament-user::user.resource.unverified'))
                    ->query(fn (Builder $builder): Builder => $builder->whereNull('email_verified_at')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('changePassword')
                    ->action(function (User $user, array $data): void {
                        $user->update([
                            'password' => Hash::make($data['new_password']),
                        ]);

                        Filament::notify('success', 'Password changed successfully.');
                    })
                    ->form([
                        Forms\Components\TextInput::make('new_password')
                            ->password()
                            ->label('New Password')
                            ->required()
                            ->rule(Password::default()),
                        Forms\Components\TextInput::make('new_password_confirmation')
                            ->password()
                            ->label('Confirm New Password')
                            ->rule('required', fn ($get): bool => (bool) $get('new_password'))
                            ->same('new_password'),
                    ])
                    ->icon('heroicon-o-key')
                // ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR)
                ,
                Tables\Actions\Action::make('deactivate')
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->action(fn (User $user) => $user->delete())
                // ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR)
                ,
            ])

            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function enablePasswordUpdates(bool|Closure $condition = true): void
    {
        static::$enablePasswordUpdates = $condition;
    }

    /*
    public static function getModel(): string
    {
        return config('filament-user-resource.model');
    }
    */

    public static function getRelations(): array
    {
        return [
            RelationManagers\TeamsRelationManager::class,
            RelationManagers\ProfileRelationManager::class,
            RelationManagers\RolesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
