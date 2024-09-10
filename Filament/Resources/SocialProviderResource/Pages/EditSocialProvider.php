<?php

namespace Modules\User\Filament\Resources\SocialProviderResource\Pages;

use Modules\User\Filament\Resources\SocialProviderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSocialProvider extends EditRecord
{
    protected static string $resource = SocialProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
