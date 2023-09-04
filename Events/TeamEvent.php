<?php

declare(strict_types=1);

namespace Modules\User\Events;

use ArtMin96\FilamentJet\Contracts\TeamContract;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

abstract class TeamEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * The team instance.
     */
    public TeamContract $team;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(TeamContract $team)
    {
        $this->team = $team;
    }
}
