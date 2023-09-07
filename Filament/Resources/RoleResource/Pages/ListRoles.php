<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\User\Filament\Resources\RoleResource;
use Savannabits\FilamentModules\Concerns\ContextualPage;

class ListRoles extends ListRecords
{
    // //use ContextualPage;
    protected static string $resource = RoleResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
