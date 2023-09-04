<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages;

use ArtMin96\FilamentJet\FilamentJet;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Modules\User\Filament\Traits\HasCachedAction;
// use Modules\User\Http\Livewire\Traits\Properties\HasSanctumPermissionsProperty;
use Modules\User\Http\Livewire\Traits\Properties\HasUserProperty;

class ApiTokens extends Page
{
    use \Savannabits\FilamentModules\Concerns\ContextualPage;
    use HasCachedAction;
    use HasUserProperty;
    // use HasSanctumPermissionsProperty;

    /**
     * The create API token name.
     *
     * @var string
     */
    public $name;

    /**
     * The create API token permissions.
     */
    public array $permissions;

    /**
     * The plain text token value.
     */
    public null|string $plainTextToken = '';

    protected static string $view = 'filament-jet::filament.pages.api-tokens';

    public function mount(): void
    {
        $this->permissions = FilamentJet::$defaultPermissions;
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return config('filament-jet.should_register_navigation.api_tokens');
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label(__('filament-jet::api.fields.token_name'))
                ->required()
                ->maxLength(255),
            CheckboxList::make('permissions')
                ->label(__('filament-jet::api.fields.permissions'))
                ->options($this->sanctumPermissions)
                ->visible(FilamentJet::hasPermissions())
                ->columns(2)
                ->required(),
        ];
    }

    /**
     * Create a new API token.
     */
    public function createApiToken(): void
    {
        $state = $this->form->getState();

        $this->displayTokenValue($this->user->createToken(
            $state['name'],
            FilamentJet::validPermissions($state['permissions'])
        ));

        $this->name = '';
        $this->permissions = FilamentJet::$defaultPermissions;

        $this->emit('tokenCreated');
    }

    protected function displayTokenValue($token): void
    {
        $this->plainTextToken = explode('|', $token->plainTextToken, 2)[1];

        $this->dispatchBrowserEvent('open-modal', ['id' => 'showing-token-modal']);
    }
}
