<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

use Filament\Pages\Actions\EditAction;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Modules\User\Filament\Resources\RoleResource;
use Savannabits\FilamentModules\Concerns\ContextualPage;

final class ViewRole extends ViewRecord
{
    // //use ContextualPage;
    protected static string $resource = RoleResource::class;

    protected function getActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
