<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\User\Filament\Resources\TeamResource;
use Savannabits\FilamentModules\Concerns\ContextualPage;

class CreateTeam extends CreateRecord
{
    // use ContextualPage;
    protected static string $resource = TeamResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['team_id'] = auth()->id();

        return $data;
    }
}
