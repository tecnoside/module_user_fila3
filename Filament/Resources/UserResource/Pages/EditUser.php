<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;
use Modules\User\Filament\Resources\UserResource;
use Savannabits\FilamentModules\Concerns\ContextualPage;
use Webmozart\Assert\Assert;

class EditUser extends EditRecord
{
    // //use ContextualPage;
    protected static string $resource = UserResource::class;

    /* --- dovrebbe fare il mutator da controllare
    public function beforeSave(): void
    {
        Assert::isArray($this->data);
        if (! array_key_exists('new_password', $this->data) || ! filled($this->data['new_password'])) {
            return;
        }

        $this->record->password = Hash::make($this->data['new_password']);
    }
    */
    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
