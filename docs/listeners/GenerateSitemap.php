<?php

<<<<<<< HEAD
=======
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> 26206f3 (up)
>>>>>>> 6f72a7ec3f85459cfbd812fec75a874814ead61a
namespace App\Listeners;

use Illuminate\Support\Str;
use samdark\sitemap\Sitemap;
use TightenCo\Jigsaw\Jigsaw;

class GenerateSitemap
{
    protected $exclude = [
        '/assets/*',
        '*/favicon.ico',
        '*/404',
    ];

    public function handle(Jigsaw $jigsaw)
    {
        $baseUrl = $jigsaw->getConfig('baseUrl');

        if (! $baseUrl) {
            echo "\nTo generate a sitemap.xml file, please specify a 'baseUrl' in config.php.\n\n";

            return;
        }

        $sitemap = new Sitemap($jigsaw->getDestinationPath().'/sitemap.xml');

        collect($jigsaw->getOutputPaths())
            ->reject(function ($path) {
                return $this->isExcluded($path);
            })->each(function ($path) use ($baseUrl, $sitemap) {
                $sitemap->addItem(rtrim($baseUrl, '/').$path, time(), Sitemap::DAILY);
            });

        $sitemap->write();
    }

    public function isExcluded($path)
    {
        return Str::is($this->exclude, $path);
    }
}
