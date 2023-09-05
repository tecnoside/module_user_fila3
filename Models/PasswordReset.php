<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Support\Carbon;
use Modules\User\Database\Factories\PasswordResetFactory;
use Illuminate\Database\Eloquent\Builder;
/**
 * Modules\User\Models\PasswordReset.
 *
 * @property string                          $email
 * @property string                          $token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 *
 * @method static PasswordResetFactory factory($count = null, $state = [])
 * @method static Builder|PasswordReset newModelQuery()
 * @method static Builder|PasswordReset newQuery()
 * @method static Builder|PasswordReset query()
 * @method static Builder|PasswordReset whereCreatedAt($value)
 * @method static Builder|PasswordReset whereCreatedBy($value)
 * @method static Builder|PasswordReset whereEmail($value)
 * @method static Builder|PasswordReset whereToken($value)
 * @method static Builder|PasswordReset whereUpdatedAt($value)
 * @method static Builder|PasswordReset whereUpdatedBy($value)
 *
 * @mixin IdeHelperPasswordReset
 * @mixin \Eloquent
 */
final class PasswordReset extends BaseModel
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
