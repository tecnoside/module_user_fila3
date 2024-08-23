<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Team;

use Livewire\Component;
use Illuminate\View\View;
use Webmozart\Assert\Assert;
use Filament\Facades\Filament;
use Modules\Xot\Datas\XotData;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Modules\User\Events\TeamSwitched;
use Modules\Xot\Contracts\UserContract;

use Filament\Notifications\Notification;
use Modules\User\Contracts\TeamContract;
use Illuminate\Contracts\Foundation\Application;

class Change extends Component
{
    // use HasUserProperty;

    public array $teams = [];

    public XotData $xot;

    public UserContract $user;

    public function mount(): void
    {
        $this->xot = XotData::make();
        Assert::notNull(Filament::auth()->user(), '['.__LINE__.']['.__FILE__.']');
        $this->user = Filament::auth()->user();
        $this->teams = $this->user->allTeams()->toArray();
    }

    /**
     * Update the authenticated user's current team.
     */
    public function switchTeam(int $teamId): Application|RedirectResponse|Redirector
    {
        $teamClass = $this->xot->getTeamClass();
        /** @var TeamContract */
        $team = $teamClass::firstWhere(['id' => $teamId]);

        if (! $this->user->switchTeam($team)) {
            abort(403);
        }
        if (null !== $team) {
            // TeamSwitched::dispatch($team->fresh(), $this->user);
            TeamSwitched::dispatch($team, $this->user);
        }
        Notification::make()
            ->title(__('Team switched'))
            ->success()
            ->send();
        /**
         * @var string|null
         */
        $path = config('filament.path');

        return redirect($path, 303);
    }

    public function render(): View
    {
        $view = 'user::livewire.team.change';
        $view_params = [
            'view' => $view,
        ];
        if ([] === $this->teams) {
            $view = 'ui::livewire.empty';
        }

        return view($view, $view_params);
    }
}
