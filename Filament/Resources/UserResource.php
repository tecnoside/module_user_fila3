<?php

/**
 * @see https://github.com/ryangjchandler/filament-user-resource/blob/main/src/Resources/UserResource.php
 * @see https://github.com/3x1io/filament-user/blob/main/src/Resources/UserResource.php
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationGroup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Modules\User\Filament\Resources\UserResource\Pages\EditUser;
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers;
use Modules\User\Filament\Resources\UserResource\RelationManagers\ClientsRelationManager;
use Modules\User\Filament\Resources\UserResource\RelationManagers\DevicesRelationManager;
use Modules\User\Filament\Resources\UserResource\RelationManagers\ProfileRelationManager;
use Modules\User\Filament\Resources\UserResource\RelationManagers\RolesRelationManager;
use Modules\User\Filament\Resources\UserResource\RelationManagers\TeamsRelationManager;
use Modules\User\Filament\Resources\UserResource\RelationManagers\TokensRelationManager;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\Xot\Filament\Resources\XotBaseResource;

class UserResource extends XotBaseResource
{
    // protected static ?string $model = \Modules\Xot\Datas\XotData::make()->getUserClass();

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
        // dddx([
        //     $form->model->teams,
        //     $form->model->currentTeam
        // ]);
        $schema = [
            'left' => Section::make(
                [
                    'name' => TextInput::make('name')
                        ->required(),
                    'email' => TextInput::make('email')
                        ->required()
                        ->unique(ignoreRecord: true),
                    /*
                    'current_team_id' => Select::make('current_team_id')
                        ->label('current team')
                        ->relationship('teams', 'name'),
                    */
                    /*
                'password' => TextInput::make('password')
                    ->required()
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->rule(Password::default()),
                */
                    /*------------
                    'password' => TextInput::make('password')
                        // ->label(trans('filament-user::user.resource.password'))
                        ->password()
                        ->maxLength(255)
                        ->dehydrateStateUsing(
                            static fn ($state) => ! empty($state)
                            ? Hash::make($state)
                            : User::find($form->getColumns())?->password
                        ),
                        */
                    /*
                    ->dehydrateStateUsing(function ($state) use ($form){
                        if(!empty($state)){
                            return Hash::make($state);
                        }

                        $user_class=\Modules\Xot\Datas\XotData::make()->getUserClass();
                        //var \Modules\Xot\Contracts\UserContract
                        $user = $user_class::find($form->getColumns());
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
}
