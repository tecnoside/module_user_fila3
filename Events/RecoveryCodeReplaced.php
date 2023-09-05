<?php

declare(strict_types=1);

namespace Modules\User\Events;

use Illuminate\Queue\SerializesModels;

class RecoveryCodeReplaced
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $code
     * @return void
     */
    public function __construct(public $user, public $code)
    {
    }
}
