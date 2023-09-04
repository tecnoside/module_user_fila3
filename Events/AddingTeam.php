<?php

declare(strict_types=1);

namespace Modules\User\Events;

use Illuminate\Foundation\Events\Dispatchable;

class AddingTeam
{
    use Dispatchable;

    /**
     * The team owner.
     */
    public $owner;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($owner)
    {
        $this->owner = $owner;
    }
}
