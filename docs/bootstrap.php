<?php

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 24f4dca (up)
declare(strict_types=1);

use App\Listeners\GenerateSitemap;
use TightenCo\Jigsaw\Jigsaw;

/* @var $container \Illuminate\Container\Container */
/* @var $events \TightenCo\Jigsaw\Events\EventBus */

/*
<<<<<<< HEAD
=======
>>>>>>> 6f72a7ec3f85459cfbd812fec75a874814ead61a
use App\Listeners\GenerateSitemap;
use TightenCo\Jigsaw\Jigsaw;

/** @var $container \Illuminate\Container\Container */
/** @var $events \TightenCo\Jigsaw\Events\EventBus */

/**
<<<<<<< HEAD
=======
>>>>>>> 26206f3 (up)
>>>>>>> 6f72a7ec3f85459cfbd812fec75a874814ead61a
=======
>>>>>>> 24f4dca (up)
 * You can run custom code at different stages of the build process by
 * listening to the 'beforeBuild', 'afterCollections', and 'afterBuild' events.
 *
 * For example:
 *
 * $events->beforeBuild(function (Jigsaw $jigsaw) {
 *     // Your code here
 * });
 */

$events->afterBuild(GenerateSitemap::class);
