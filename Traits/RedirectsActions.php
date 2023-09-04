<?php

declare(strict_types=1);

namespace Modules\User\Traits;

use Illuminate\Http\Response;

trait RedirectsActions
{
    /**
     * Get the redirect response for the given action.
     *
     * @param object $action
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function redirectPath($action): Response
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
