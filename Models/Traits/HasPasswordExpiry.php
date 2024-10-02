<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Modules\Xot\Actions\Model\HasColumnAction;

trait HasPasswordExpiry
{
    public static function bootHasPasswordExpiry()
    {
        // if (! app(HasColumnAction::class)->execute(auth()->user(), 'password_expires_at')) {
        //    dddx('a');
        // }

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
