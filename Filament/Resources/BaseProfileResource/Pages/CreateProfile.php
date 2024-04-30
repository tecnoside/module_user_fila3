<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

use Illuminate\Support\Arr;
use Modules\Xot\Datas\XotData;
use Filament\Resources\Pages\CreateRecord;
use Modules\User\Filament\Resources\BaseProfileResource;

class CreateProfile extends CreateRecord
{
    protected static string $resource = BaseProfileResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        
        $user_data=Arr::except($data,['user']);
        $user_data=array_merge($user_data,$data['user']?? []);
        $user_class=XotData::make()->getUserClass();
        $user = $user_class::create($user_data);
        $data['user_id']=$user->id;
        
        return $data;
    }
}
