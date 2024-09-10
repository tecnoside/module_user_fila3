<?php

namespace Modules\User\Filament\Resources\SocialProviderResource\Pages;

use Modules\User\Filament\Resources\SocialProviderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSocialProvider extends CreateRecord
{
    protected static string $resource = SocialProviderResource::class;
}
