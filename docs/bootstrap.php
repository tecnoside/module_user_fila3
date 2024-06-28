<?php

declare(strict_types=1);

use App\Listeners\GenerateSitemap;

/* @var \Illuminate\Container\Container $container */
/* @var \TightenCo\Jigsaw\Events\EventBus $events */

$events->afterBuild(GenerateSitemap::class);
