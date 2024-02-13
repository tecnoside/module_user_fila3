<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

trait RedirectsActions
{
    /**
     * Get the redirect response for the given action.
     */
    public function redirectPath(object $action): RedirectResponse|Response|Redirector
    {
        if (method_exists($action, 'redirectTo')) {
            $response = $action->redirectTo();
        } else {
            $response = property_exists($action, 'redirectTo')
                ? $action->redirectTo
                : config('filament.path');
        }

        return $response instanceof Response ? $response : redirect($response);
    }
}
