<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\Pages;

use Filament\Pages\Actions\ViewAction;
use Filament\Pages\Actions\DeleteAction;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\User\Filament\Resources\TeamResource;
use Savannabits\FilamentModules\Concerns\ContextualPage;

final class EditTeam extends EditRecord
{
    // //use ContextualPage;
    protected static string $resource = TeamResource::class;

    protected function getActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
