<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Tenant\Services\TenantService;
use Webmozart\Assert\Assert;

use function Safe\file_get_contents;

class TermsOfService extends Component
{
    /**
     * Show the terms of service for the application.
     *
     * @return View
     */
    public function render()
    {
        Assert::string($termsFile = TenantService::localizedMarkdownPath('terms.md'), 'wip');

        $view = view('filament-jet::livewire.terms-of-service', [
            'terms' => Str::markdown(file_get_contents($termsFile)),
        ]);

        $view->layout('filament::components.layouts.base', [
            'title' => __('filament-jet::registration.terms_of_service'),
        ]);

        return $view;
    }
}
