<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\Pages;

use Filament\Pages\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Modules\User\Filament\Resources\TeamResource;
use Savannabits\FilamentModules\Concerns\ContextualPage;

class ViewTeam extends ViewRecord
{
    // //use ContextualPage;
    protected static string $resource = TeamResource::class;

    protected function getActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
