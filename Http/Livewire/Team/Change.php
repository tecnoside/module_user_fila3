<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Team;

use Livewire\Component;
use Illuminate\View\View;
use Webmozart\Assert\Assert;
use Modules\User\Models\User;
use Filament\Facades\Filament;
use Modules\Xot\Datas\XotData;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Modules\User\Events\TeamSwitched;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Foundation\Application;
use Modules\User\Http\Livewire\Traits\Properties\HasUserProperty;

class Change extends Component
{
    // use HasUserProperty;

    public array $teams=[];

    public XotData $xot;
    public User $user;

    public function mount(): void
    {
        $this->xot = XotData::make();
        Assert::notNull(Filament::auth()->user());
        $this->user = Filament::auth()->user();
        $this->teams = $this->user->allTeams()->toArray();
    }

    /**
     * Update the authenticated user's current team.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function switchTeam(int $teamId)
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
        $view='user::livewire.team.change';
        $view_params=[
            'view'=>$view,
        ];
        if(count($this->teams)==0){
            $view='ui::livewire.empty';
        }
        return view($view,$view_params);
    }
}
