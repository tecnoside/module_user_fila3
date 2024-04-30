<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Arr;
use Modules\User\Filament\Resources\BaseProfileResource;
use Modules\Xot\Datas\XotData;

class CreateProfile extends CreateRecord
{
    protected static string $resource = BaseProfileResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $user_data = Arr::except($data, ['user']);
        $user_data = array_merge($user_data, $data['user'] ?? []);
        $user_class = XotData::make()->getUserClass();
        $user = $user_class::create($user_data);
        $data['user_id'] = $user->id;

        return $data;
    }
}
