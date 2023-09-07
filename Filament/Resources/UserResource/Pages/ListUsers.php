<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Savannabits\FilamentModules\Concerns\ContextualPage;

class ListUsers extends ListRecords
{
    // //use ContextualPage;
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            UserOverview::class,
        ];
    }
}
