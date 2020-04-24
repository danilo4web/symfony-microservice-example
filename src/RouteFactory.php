<?php declare(strict_types=1);

namespace App\ProductsService;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;

class RouteFactory
{
    public static function getRoutes(string ...$files): RouteCollection
    {
        $routeLoader = new YamlFileLoader(new FileLocator(__DIR__ . '/../routes'));

        $routeCollection = new RouteCollection();
        foreach ($files as $file) {
            $routeCollection->addCollection($routeLoader->load($file));
        }

        return $routeCollection;
    }
}
