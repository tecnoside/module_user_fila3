<?php

declare(strict_types=1);

use Illuminate\Support\Str;

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Docs Starter Template',
    'siteDescription' => 'Beautiful docs powered by Jigsaw',

    // Algolia DocSearch credentials
    'docsearchApiKey' => env('DOCSEARCH_KEY'),
    'docsearchIndexName' => env('DOCSEARCH_INDEX'),

    // navigation menu
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    'navigation' => require_once ('navigation.php'),
=======
=======
>>>>>>> 64b880d (Check & fix styling)
<<<<<<< Updated upstream
    'navigation' => require_once('navigation.php'),
=======
<<<<<<< Updated upstream
    'navigation' => require_once ('navigation.php'),
=======
    'navigation' => require_once('navigation.php'),
>>>>>>> Stashed changes
>>>>>>> Stashed changes
<<<<<<< HEAD
>>>>>>> 80d19d7 (ADD: HasTenants to User Model)
=======
=======
    'navigation' => require_once ('navigation.php'),
>>>>>>> 1a41d3d (Check & fix styling)
>>>>>>> 64b880d (Check & fix styling)
=======
    'navigation' => require_once ('navigation.php'),
>>>>>>> 7a503fc (rebase 2/3)

    // helpers
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return Str::startsWith($path, 'http') ? $path : '/'.trimPath($path);
    },
];
