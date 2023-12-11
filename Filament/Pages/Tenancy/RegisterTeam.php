<?php

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Form;
use Modules\Xot\Datas\XotData;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Modules\User\Contracts\TeamContract;
use Filament\Pages\Tenancy\RegisterTenant;

class RegisterTeam extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register team';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                // ...
            ]);
    }


    /**
    * @param  array<string, mixed>  $data
    */
   protected function handleRegistration(array $data): Model
    {
        //$xot=XotData::make()
        //$team = Team::create($data);
        $teamClass = XotData::make()->getTeamClass();
        $team = $teamClass::create($data);

        $team->members()->attach(auth()->user());

        return $team;
    }
}
