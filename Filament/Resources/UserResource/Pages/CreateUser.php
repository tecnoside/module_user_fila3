<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\User\Filament\Resources\UserResource;
use Savannabits\FilamentModules\Concerns\ContextualPage;

class CreateUser extends CreateRecord
{
    // //use ContextualPage;
    protected static string $resource = UserResource::class;
}
