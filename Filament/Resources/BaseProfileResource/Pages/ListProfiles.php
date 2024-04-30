<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\User\Filament\Resources\BaseProfileResource;

class ListProfiles extends ListRecords
{
    protected static string $resource = BaseProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
