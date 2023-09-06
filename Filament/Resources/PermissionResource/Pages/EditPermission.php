<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PermissionResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Modules\User\Filament\Resources\PermissionResource;
use Savannabits\FilamentModules\Concerns\ContextualPage;

class EditPermission extends EditRecord
{
    // //use ContextualPage;
    protected static string $resource = PermissionResource::class;
}
