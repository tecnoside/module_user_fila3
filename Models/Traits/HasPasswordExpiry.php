<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

trait HasPasswordExpiry
{
    public static function bootHasPasswordExpiry()
    {
        static::creating(function ($model) {
            if (filled($model->password)) {
                $model->password_expires_at = now()->addDays(30);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('password') && filled($model->password)) {
                $model->password_expires_at = now()->addDays(30);
            }
        });
    }
}
