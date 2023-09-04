<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire;

use ArtMin96\FilamentJet\FilamentJet;
use Illuminate\Support\Str;
use Livewire\Component;

use function Safe\file_get_contents;

use Webmozart\Assert\Assert;

class PrivacyPolicy extends Component
{
    /**
     * Show the terms of service for the application.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        Assert::string($policyFile = FilamentJet::localizedMarkdownPath('policy.md'), 'wip');

        $view = view('filament-jet::livewire.privacy-policy', [
            'terms' => Str::markdown(file_get_contents($policyFile)),
        ]);

        $view->layout('filament::components.layouts.base', [
            'title' => __('filament-jet::registration.privacy_policy'),
        ]);

        return $view;
    }
}
