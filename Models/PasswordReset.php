<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Support\Carbon;
use Modules\User\Database\Factories\PasswordResetFactory;
use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\User\Models\PasswordReset.
 *
 * @method static \Modules\User\Database\Factories\PasswordResetFactory factory($count = null, $state = [])
 * @method static Builder|PasswordReset newModelQuery()
 * @method static Builder|PasswordReset newQuery()
 * @method static Builder|PasswordReset query()
 * @mixin \Eloquent
 */
class PasswordReset extends BaseModel
{
    /**
     * @var array<string>
     *
     * @psalm-var list{'email', 'token', 'created_at', 'updated_at', 'created_by', 'updated_by'}
     */
    protected $fillable = ['email', 'token', 'created_at', 'updated_at', 'created_by', 'updated_by'];

    /**
     * @var string
     */
    protected $table = 'password_resets';
}// end class PasswordReset
