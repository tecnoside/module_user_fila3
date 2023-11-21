<?php

use App\Listeners\GenerateSitemap;
use TightenCo\Jigsaw\Jigsaw;

/** @var $container \Illuminate\Container\Container */
/** @var $events \TightenCo\Jigsaw\Events\EventBus */


$events->afterBuild(GenerateSitemap::class);
