<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Team;

use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;
use Modules\User\Events\TeamSwitched;
use Modules\User\Models\User;
use Modules\User\Http\Livewire\Traits\Properties\HasUserProperty;
use Modules\Xot\Datas\XotData;

class Change extends Component
{
    //use HasUserProperty;

    public array $teams;

    public XotData $xot;
    public User $user;

    public function mount(): void
    {
        $this->xot = XotData::make();
        $this->user = Filament::auth()->user();
        $this->teams = $this->user->allTeams()->toArray();
    }

    /**
     * Update the authenticated user's current team.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function switchTeam($teamId)
    {
        $teamClass = $this->xot->getTeamClass();
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
