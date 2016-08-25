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

            return $routerContainer;
        };
    }
}
