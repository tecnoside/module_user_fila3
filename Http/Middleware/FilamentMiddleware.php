<?php

declare(strict_types=1);

namespace Modules\User\Http\Middleware;

use Modules\Xot\Http\Middleware\XotBaseFilamentMiddleware;

class FilamentMiddleware extends XotBaseFilamentMiddleware
{
    public static string $module = 'User';

    public static string $context = 'filament';

    /*
    private function getModule()
    {
        return app('modules')->findOrFail(static::$module);
    }


    private function getContextName(): string
    {
        $module = $this->getModule();
        if (! static::$context) {
            throw new \Exception('Context has to be defined in your class');
        }

        return Str::of($module->getLowerName())->append('-')->append(\Str::slug(static::$context))->kebab()->toString();
    }

    protected function authenticate($request, array $guards): void
    {
        $context = $this->getContextName();
        Assert::string($guardName = config("$context.auth.guard"), 'wip');
        $guard = $this->auth->guard($guardName);

        if (! $guard->check()) {
            $this->unauthenticated($request, $guards);

            return;
        }

        $this->auth->shouldUse($guardName);

        $user = $guard->user();

        if ($user instanceof FilamentUser) {
            abort_if(! $user->canAccessFilament(), 403);

            return;
        }

        abort_if('local' !== config('app.env'), 403);
    }

    protected function redirectTo($request): string
    {
        $context = $this->getContextName();

        return route("$context.auth.login");
    }
    */
}
