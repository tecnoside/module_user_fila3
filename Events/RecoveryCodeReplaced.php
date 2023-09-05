<?php

declare(strict_types=1);

namespace Modules\User\Events;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Queue\SerializesModels;

final class RecoveryCodeReplaced
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param Authenticatable $user
     * @param string                                     $code
     *
     * @return void
     */
    public function __construct(public $user, public $code)
    {
    }
}
