<?php

namespace Modules\User\Filament\Pages;

use Filament\Pages\Page;

abstract class CardPage extends Page
{
    use \Savannabits\FilamentModules\Concerns\ContextualPage;
    protected static string $layout = 'filament-jet::components.layouts.card';

    protected function getLayoutData(): array
    {
        return array_merge(
            parent::getLayoutData(),
            [
                'width' => $this->getCardWidth(),
                'hasBrand' => $this->hasBrand(),
                'getHeading' => $this->getHeading(),
                'getSubheading' => $this->getSubheading(),
            ]
        );
    }

    abstract protected function getCardWidth(): string;

    abstract protected function hasBrand(): bool;
}
