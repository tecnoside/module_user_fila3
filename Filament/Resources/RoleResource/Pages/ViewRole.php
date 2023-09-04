<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Modules\User\Filament\Resources\RoleResource;
use Savannabits\FilamentModules\Concerns\ContextualPage;

class ViewRole extends ViewRecord
{
    // use ContextualPage;
    protected static string $resource = RoleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
