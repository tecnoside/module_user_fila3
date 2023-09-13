<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\User\Filament\Resources\TeamResource;


class ListTeams extends ListRecords
{
    // //
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
