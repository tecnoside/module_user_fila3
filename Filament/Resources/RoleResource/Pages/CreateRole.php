<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\RoleResource;
use Modules\User\Support\Utils;
use Savannabits\FilamentModules\Concerns\ContextualPage;

class CreateRole extends CreateRecord
{
    // //use ContextualPage;
    public Collection $permissions;

    protected static string $resource = RoleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->permissions = collect($data)->filter(fn ($permission, $key): bool => ! in_array($key, ['name', 'guard_name', 'select_all']) && Str::contains($key, '_'))->keys();

        $res = Arr::only($data, ['name', 'guard_name']);
        $res['team_id'] = 1;

        return $res;
    }

    protected function afterCreate(): void
    {
        $permissionModels = collect();
        $this->permissions->each(function ($permission) use ($permissionModels): void {
            $permissionModels->push(Utils::getPermissionModel()::firstOrCreate([
                /* @phpstan-ignore-next-line */
                'name' => $permission,
                'guard_name' => $this->data['guard_name'],
            ]));
        });

        $this->record->syncPermissions($permissionModels);
    }
}
