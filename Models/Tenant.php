<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\User\Contracts\TenantContract;

class Tenant extends BaseModel implements TenantContract
{
    protected $fillable = [
        'id',
        'name',
        'email_address',
        'phone',
        'mobile',
        'address',
        'primary_color',
        'secondary_color',
    ];
}
