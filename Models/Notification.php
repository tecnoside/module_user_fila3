<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Notifications\DatabaseNotification as BaseNotification;


class Notification extends BaseNotification
{
    /** @var string */
    protected $connection = 'user';

    // protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];
}