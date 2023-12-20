<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages;

use ArtMin96\FilamentJet\FilamentJet;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Actions\Action;
use Filament\Pages\Page;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;
use Livewire\Redirector;
use Modules\User\Actions\UpdateTeamMemberRole;
use Modules\User\Actions\ValidateTeamDeletion;
use Modules\User\Contracts\AddsTeamMembers;
use Modules\User\Contracts\DeletesTeams;
use Modules\User\Contracts\InvitesTeamMembers;
use Modules\User\Contracts\RemovesTeamMembers;
use Modules\User\Contracts\UpdatesTeamNames;
use Modules\User\Features;
use Modules\User\Filament\Actions\AlwaysAskPasswordConfirmationAction;
use Modules\User\Filament\Traits\HasCachedAction;
use Modules\User\Http\Livewire\Traits\Properties\HasUserProperty;
use Modules\User\Models\Team;
use Modules\User\Role;
use Modules\User\Traits\RedirectsActions;
use Suleymanozev\FilamentRadioButtonField\Forms\Components\RadioButton;

class TeamSettings extends Page
{
    use \Savannabits\FilamentModules\Concerns\ContextualPage;
    use HasCachedAction;
    use RedirectsActions;
    use HasUserProperty;

    protected static string $view = 'filament-jet::filament.pages.team-settings';

    public ?Team $team;

    public ?array $teamState = [];

    public ?array $addTeamMemberState = [];

    public ?string $email = null;

    public ?string $role = null;

    /**
     * The user that is having their role managed.
     */
    public Authenticatable|Model $managingRoleFor;

    /**
     * The current role for the user that is having their role managed.
     */
    public ?string $currentRole = null;

    public function mount()
    {
        $this->team = $this->user->currentTeam;

        if (! $this->team) {
            Notification::make()
                ->title(__('filament-jet::teams/messages.current_team_not_exists'))
                ->warning()
                ->send();

            return redirect(config('filament.path'));
        }

        $this->updateTeamNameForm->fill($this->team->withoutRelations()->toArray());
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return config('filament-jet.should_register_navigation.team_settings');
    }

    /**
     * Get the available team member roles.
     */
    public function getRolesProperty(): array
    {
        return collect(FilamentJet::$roles)
            ->transform(function ($role) {
                return with($role->jsonSerialize(), function ($data) {
                    return (new Role(
                        $data['key'],
                        $data['name'],
                        $data['permissions']
                    ))->description($data['description']);
                });
            })
            ->values()
            ->all();
    }

    protected function getForms(): array
    {
        return array_merge(
            parent::getForms(),
            [
                'updateTeamNameForm' => $this->makeForm()
                    ->model(FilamentJet::teamModel())
                    ->schema([
                        TextInput::make('name')
                            ->label(__('filament-jet::teams/name.fields.name'))
                            ->required()
                            ->maxLength(255)
                            ->disabled(! Gate::check('update', $this->team)),
                    ])
                    ->statePath('teamState'),
                'addTeamMemberForm' => $this->makeForm()
                    ->model(FilamentJet::teamInvitationModel())
                    ->schema([
                        TextInput::make('email')
                            ->label(__('filament-jet::teams/add-member.fields.email'))
                            ->required()
                            ->maxLength(255)
                            ->rule('email')
                            ->rules([
                                'email',
                                Features::sendsTeamInvitations()
                                    ? '' : Rule::exists(table: FilamentJet::userModel(), column: 'email'),
                                function () {
                                    return function (string $attribute, $value, \Closure $fail) {
                                        if ($this->team->hasUserWithEmail($value)) {
                                            $fail(__('filament-jet::teams/add-member.messages.already_belongs_to_team'));
                                        }
                                    };
                                },
                            ])
                            ->unique(callback: fn (Unique $rule): Unique => $rule->where('team_id', $this->team->id)),
                        RadioButton::make('role')
                            ->label(__('filament-jet::teams/add-member.fields.role'))
                            ->options(
                                collect($this->roles)->mapWithKeys(fn ($role): array => [
                                    $role->key => $role->name,
                                ])->toArray()
                            )
                            ->descriptions(
                                collect($this->roles)->mapWithKeys(fn ($role): array => [
                                    $role->key => $role->description,
                                ])->toArray()
                            )
                            ->columns(1)
                            ->rules(FilamentJet::hasRoles()
                                ? ['required', 'string', new \Modules\User\Rules\Role()]
                                : []
                            ),
                    ]),
            ]
        );
    }

    protected function getHiddenActions(): array
    {
        return [
            AlwaysAskPasswordConfirmationAction::make('delete_team')
                ->label(__('filament-jet::teams/delete.buttons.delete'))
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->action('deleteTeam'),
            Action::make('manage_role')
                ->action(function (array $data): void {
                    $this->updateRole(app(UpdateTeamMemberRole::class));
                })
                ->modalWidth('lg')
                ->modalHeading(__('filament-jet::teams/members.modal_heading'))
                ->modalSubheading(__('filament-jet::teams/members.modal_subheading'))
                ->modalButton(__('filament-jet::teams/members.buttons.save'))
                ->form([
                    RadioButton::make('role')
                        ->label(__('filament-jet::teams/members.fields.role'))
                        ->options(
                            collect($this->roles)->mapWithKeys(fn ($role): array => [
                                $role->key => $role->name,
                            ])->toArray()
                        )
                        ->descriptions(
                            collect($this->roles)->mapWithKeys(fn ($role): array => [
                                $role->key => $role->description,
                            ])->toArray()
                        )
                        ->afterStateUpdated(
                            fn ($state) => $this->currentRole = $state
                        )
                        ->columns(1)
                        ->rules(FilamentJet::hasRoles()
                            ? ['required', 'string', new \Modules\User\Rules\Role()]
                            : []
                        ),
                ]),
        ];
    }

    public function updateTeamName(UpdatesTeamNames $updater): void
    {
        $updater->update($this->user, $this->team, $this->teamState);

        Notification::make()
            ->title(__('filament-jet::teams/name.messages.updated'))
            ->success()
            ->send();
    }

    /**
     * Add a new team member to a team.
     */
    public function addTeamMember(): void
    {
        $this->addTeamMemberForm->getState();

        if (Features::sendsTeamInvitations()) {
            app(InvitesTeamMembers::class)->invite(
                $this->user,
                $this->team,
                $this->email,
                $this->role
            );

            $message = __('filament-jet::teams/add-member.messages.invited');
        } else {
            app(AddsTeamMembers::class)->add(
                $this->user,
                $this->team,
                $this->email,
                $this->role
            );

            $message = __('filament-jet::teams/add-member.messages.added');
        }

        $this->email = '';
        $this->role = null;

        $this->team = $this->team->fresh();

        Notification::make()
            ->title($message)
            ->success()
            ->send();
    }

    /**
     * Cancel a pending team member invitation.
     */
    public function cancelTeamInvitation(int $invitationId): void
    {
        if (! empty($invitationId)) {
            $model = FilamentJet::teamInvitationModel();

            $model::whereKey($invitationId)->delete();
        }

        $this->team = $this->team->fresh();

        Notification::make()
            ->title(__('filament-jet::teams/invitations.messages.invitation_canceled'))
            ->success()
            ->send();
    }

    /**
     * Delete the team.
     */
    public function deleteTeam(ValidateTeamDeletion $validator, DeletesTeams $deleter): Redirector
    {
        $validator->validate(Filament::auth()->user(), $this->team);

        $deleter->delete($this->team);

        Notification::make()
            ->title(__('filament-jet::teams/delete.messages.deleted'))
            ->success()
            ->send();

        return $this->redirectPath($deleter);
    }

    /**
     * Remove a team member from the team.
     */
    public function removeTeamMember(int $userId, RemovesTeamMembers $remover): void
    {
        $remover->remove(
            $this->user,
            $this->team,
            $user = FilamentJet::findUserByIdOrFail($userId)
        );

        $this->team = $this->team->fresh();

        Notification::make()
            ->title(__('filament-jet::teams/members.messages.removed'))
            ->success()
            ->send();
    }

    /**
     * Remove the currently authenticated user from the team.
     */
    public function leaveTeam(RemovesTeamMembers $remover): Redirector
    {
        $this->errorBagExcept('team');

        $remover->remove(
            $this->user,
            $this->team,
            $this->user
        );

        $this->team = $this->team->fresh();

        Notification::make()
            ->title(__('filament-jet::teams/members.messages.leave'))
            ->success()
            ->send();

        return redirect(config('filament.path'));
    }

    /**
     * Allow the given user's role to be managed.
     */
    public function manageRole(int $userId): void
    {
        $this->managingRoleFor = FilamentJet::findUserByIdOrFail($userId);
        $this->currentRole = $this->managingRoleFor->teamRole($this->team)->key;

        $this->mountAction('manage_role');
        $this->getMountedActionForm()->fill(['role' => $this->currentRole]);
    }

    /**
     * Save the role for the user being managed.
     */
    public function updateRole(UpdateTeamMemberRole $updater): void
    {
        $updater->update(
            $this->user,
            $this->team,
            $this->managingRoleFor->id,
            $this->currentRole
        );

        $this->team = $this->team->fresh();

        Notification::make()
            ->title(__('filament-jet::teams/members.messages.role_updated'))
            ->success()
            ->send();
    }

    /**
     * @return array<string, string>
     */
    protected function getMessages(): array
    {
        return [
            'email.unique' => __('filament-jet::teams/add-member.messages.already_invited_to_team'),
            'email.exists' => __('filament-jet::teams/add-member.messages.email_not_registered'),
        ];
    }
}
