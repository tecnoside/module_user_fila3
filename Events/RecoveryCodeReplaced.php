<?php

declare(strict_types=1);

namespace Modules\User\Events;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Queue\SerializesModels;

class RecoveryCodeReplaced
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
<<<<<<< HEAD
=======
     * @param  Authenticatable  $user
     * @param  string  $code
>>>>>>> 2a8c136 (Dusting)
     * @return void
     */
    public function __construct(public Authenticatable $user, public string $code)
    {
    }
}
