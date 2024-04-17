<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\User\Contracts\TenantContract;

/**
 * Modules\User\Models\Tenant.
 *
 * @method static \Modules\User\Database\Factories\TenantFactory factory($count = null, $state = [])
 *                                                                                                   <<<<<<< HEAD
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant   query()
 *
 * =======
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant query()
 *                                                                             <<<<<<< HEAD
 *                                                                             >>>>>>> 7520125 (up)
 *                                                                             =======
 *
 * >>>>>>> d176b8d (Check & fix styling)
 *
 * @mixin \Eloquent
 */
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
