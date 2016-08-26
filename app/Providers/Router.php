<?php

namespace App\Providers;

use Fol\ServiceProviderInterface;
use Aura\Router\RouterContainer;

class Router implements ServiceProviderInterface
{
    public function register(\Fol $app)
    {
        $app['router'] = function ($app) {
            $ns = $app->getNamespace('Controllers');

            $routerContainer = new RouterContainer();

            $map = $routerContainer->getMap();

            $map->get('home', '/', "{$ns}\\Index::home");
            $map->get('news', '/novas', "{$ns}\\Index::news");
            $map->get('new', '/nova/{slug}', "{$ns}\\Index::newPermalink");
            $map->get('events', '/axenda', "{$ns}\\Index::events");
            $map->get('candidates', '/candidaturas', "{$ns}\\Index::candidates");

            return $routerContainer;
        };
    }
}
