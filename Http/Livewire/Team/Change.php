<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Team;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;
use Illuminate\View\View;
use Filament\Facades\Filament;
use Modules\Xot\Datas\XotData;
use ArtMin96\FilamentJet\FilamentJet;
use Modules\User\Events\TeamSwitched;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Http\Livewire\Traits\Properties\HasUserProperty;

class Change extends Component
{
    use HasUserProperty;

    public Collection $teams;

    public XotData $xot;

    public function mount(): void
    {
        $this->xot=XotData::make();
        $this->teams = Filament::auth()->user()?->allTeams();
    }

    /**
     * Update the authenticated user's current team.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function switchTeam($teamId)
    {

        $teamClass=$this->xot->getTeamClass();
        $team = $teamClass::findOrFail($teamId);

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