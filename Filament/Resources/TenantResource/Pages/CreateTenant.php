<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Filament\Resources\TenantResource;
use Modules\User\Models\Tenant;

class CreateTenant extends CreateRecord
{
    protected static string $resource = TenantResource::class;

    /**
     * @throws \Throwable
     */
    protected function handleRecordCreation(array $data): Model
    {
        $record = parent::handleRecordCreation(collect($data)->except('domain')->toArray());
        // $record->domains()->create(['domain' => collect($data)->get('domain')]);

        return $record;
    }

    // :30    Method Modules\User\Filament\Resources\TenantResource\Pages\CreateTenant::createTenantRecord() is unused.
    //      ✏️  User\Filament\Resources\TenantResource\Pages\CreateTenant.php
    // /**
    //  * @throws \Throwable
    //  */
    // private function createTenantRecord(array $data)
    // {
    //     \Log::info('Saving Tenant');
    //     $record = new Tenant(collect($data)->except('domain')->toArray());
    //     $record->saveOrFail();
    //     \Log::info('Saving Domains');
    //     $record = $record::find($record->id);
    //     $record->domains()->create(['domain' => collect($data)->get('domain')]);

    //     return $record;
    // }
}
