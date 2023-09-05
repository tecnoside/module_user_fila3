<?php

declare(strict_types=1);

namespace Modules\User\Datas;

use Spatie\LaravelData\Data;

/**
 * Undocumented class.
 */
final class FilamentUserData extends Data
{
    public bool $enabled;

     // => true,
    public string $name; // => 'filament_user',
}
