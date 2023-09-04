<?php

declare(strict_types=1);

namespace Modules\User\Models;

/**
 * Modules\User\Models\PasswordReset.
 *
 * @property string                          $email
 * @property string                          $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 *
 * @method static \Modules\User\Database\Factories\PasswordResetFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset   query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset   whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset   whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset   whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset   whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset   whereUpdatedBy($value)
 *
 * @mixin IdeHelperPasswordReset
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
