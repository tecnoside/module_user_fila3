<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\PHPUnit\Set\PHPUnitLevelSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use RectorLaravel\Rector\MethodCall\RedirectRouteToToRouteHelperRector;
use RectorLaravel\Set\LaravelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
<<<<<<< HEAD
        __DIR__.'/Modules',
        __DIR__.'/app',
        __DIR__.'/bootstrap',
        __DIR__.'/config',
        __DIR__.'/lang',
        __DIR__.'/resources',
        __DIR__.'/routes',
        __DIR__.'/tests',
    ]);

    $rectorConfig->skip([
        __DIR__.'/Modules/*/docs',
        __DIR__.'/Modules/*/vendor',
        '*/docs',
        '*/vendor',
=======
        __DIR__,
>>>>>>> ed4457da08ac6ece1dbb5ad2536a366bcc328c86
    ]);

    // register a single rule
    // $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
<<<<<<< HEAD
=======

>>>>>>> ed4457da08ac6ece1dbb5ad2536a366bcc328c86
    $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);

    // define sets of rules
    $rectorConfig->sets([
        PHPUnitLevelSetList::UP_TO_PHPUNIT_100,
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        LevelSetList::UP_TO_PHP_81,
        LaravelSetList::LARAVEL_100,

<<<<<<< HEAD
        // SetList::NAMING, //problemi con injuction
        // SetList::TYPE_DECLARATION,
        // SetList::CODING_STYLE,
        // SetList::PRIVATIZATION,//problemi con final
=======
        // SetList::NAMING, // error on injection
        // SetList::TYPE_DECLARATION,
        // SetList::CODING_STYLE,
        // SetList::PRIVATIZATION, //error "final class"
>>>>>>> ed4457da08ac6ece1dbb5ad2536a366bcc328c86
        // SetList::EARLY_RETURN,
        // SetList::INSTANCEOF,
    ]);

<<<<<<< HEAD
=======
    $rectorConfig->skip([
        // testdummy files
        '*/docs',
        '*/vendor',
    ]);

>>>>>>> ed4457da08ac6ece1dbb5ad2536a366bcc328c86
    $rectorConfig->importNames();
};
