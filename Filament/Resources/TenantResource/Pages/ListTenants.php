<?php
/**
<<<<<<< HEAD
 * --.
=======
 * --
>>>>>>> 85d4d07 (.)
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\User\Filament\Resources\TenantResource;

class ListTenants extends ListRecords
{
    protected static string $resource = TenantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
