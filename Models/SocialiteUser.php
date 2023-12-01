<?php

declare(strict_types=1);

/**
 * inspired by  DutchCodingCompany\FilamentSocialite.
 */

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Xot\Datas\XotData;

/**
 * Modules\User\Models\SocialiteUser.
 *
 * @property \Modules\User\Models\User|null $user
 *
 * @method static Builder|SocialiteUser newModelQuery()
 * @method static Builder|SocialiteUser newQuery()
 * @method static Builder|SocialiteUser query()
 *
 * @mixin \Eloquent
 */
class SocialiteUser extends BaseModel
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        // 'id',
        'user_id',
        'provider',
        'provider_id',
        'token',
        'name',
        'email',
        'avatar',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            XotData::resolveUserClass()
        );
    }
}
