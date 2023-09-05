<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PermissionResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\User\Filament\Resources\PermissionResource;
use Savannabits\FilamentModules\Concerns\ContextualPage;

final class CreatePermission extends CreateRecord
{
    // //use ContextualPage;
    protected static string $resource = PermissionResource::class;
}
