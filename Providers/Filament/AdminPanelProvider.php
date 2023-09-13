<?php

declare(strict_types=1);

namespace Modules\User\Providers\Filament;

use Filament\Panel;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'User';

    public function panel(Panel $panel): Panel
    {

        FilamentView::registerRenderHook(
            'panels::user-menu.before',
            fn (): string =>  Blade::render('@livewire(\'team.change\')'),
        );

        return parent::panel($panel);
    }
}