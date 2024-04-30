<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\User\Filament\Resources\BaseProfileResource;

class CreateProfile extends CreateRecord
{
    protected static string $resource = BaseProfileResource::class;
}
