<?php

namespace Modules\User\Filament\Resources\SocialProviderResource\Pages;

use Modules\User\Filament\Resources\SocialProviderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSocialProvider extends ViewRecord
{
    protected static string $resource = SocialProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
