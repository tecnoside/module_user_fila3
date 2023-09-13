<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Team;

use Filament\Facades\Filament;
use ArtMin96\FilamentJet\FilamentJet;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Modules\User\Events\TeamSwitched;
use Modules\User\Http\Livewire\Traits\Properties\HasUserProperty;

class Change extends Component
{
    use HasUserProperty;

    public Collection $teams;

    public function mount(): void
    {
        $this->teams = Filament::auth()->user()?->allTeams();
    }

    /**
     * Update the authenticated user's current team.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function switchTeam($teamId)
    {
        dddx('aaa');
        $team = FilamentJet::newTeamModel()->findOrFail($teamId);

        if (! $this->user->switchTeam($team)) {
            abort(403);
        }

        TeamSwitched::dispatch($team->fresh(), $this->user);

        Notification::make()
            ->title(__('Team switched'))
            ->success()
            ->send();

        return redirect(config('filament.path'), 303);
    }

    public function render(): View
    {
        return view('user::livewire.team.change');
    }
}