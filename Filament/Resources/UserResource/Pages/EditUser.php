<?php
/**
 * @see https://github.com/ryangjchandler/filament-user-resource/blob/main/src/Resources/UserResource/Pages/EditUser.php
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\User\Filament\Resources\UserResource;

class EditUser extends EditRecord
{
    // //
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
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
