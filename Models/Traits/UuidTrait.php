<?php

declare(strict_types=1);

/**
 * @see https://spatie.be/docs/laravel-permission/v5/advanced-usage/uuid
 */

namespace Modules\User\Models\Traits;

use Illuminate\Support\Str;

trait UuidTrait
{
    public static function bootUuidTrait(): void
    {
        static::creating(
            static function ($model): void {
                $model->keyType = 'string';
                $model->incrementing = false;
                $model->{$model->getKeyName()} = $model->{$model->getKeyName()} ?: (string) Str::orderedUuid();
            }
        );
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }
}
