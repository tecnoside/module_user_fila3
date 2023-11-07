<?php

declare(strict_types=1);

namespace Modules\User\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use SocialiteProviders\Auth0\Auth0ExtendSocialite;
use SocialiteProviders\Manager\SocialiteWasCalled;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<string, array<int, string>>
     */
    protected $listen = [
        SocialiteWasCalled::class => [
            Auth0ExtendSocialite::class.'@handle',
        ],
    ];
}
