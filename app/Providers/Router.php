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
            $map->get('news-rss', '/novas.xml', "{$ns}\\Index::news");
            $map->get('new', '/nova/{slug}', "{$ns}\\Index::newPermalink");
            $map->get('events', '/axenda', "{$ns}\\Index::events");
            $map->get('candidates', '/candidaturas', "{$ns}\\Index::candidates");
            $map->get('privacy', '/privacidade', "{$ns}\\Index::privacy");
            $map->get('contact', '/contacto', "{$ns}\\Index::contact");
            $map->get('about', '/en-marea{/slug}', "{$ns}\\Index::about");
            $map->get('bio', '/luis-villares', "{$ns}\\Index::bio");
            $map->get('program', '/programa2016', "{$ns}\\Index::program");
            $map->get('program-action', '/programa2016/medida/{number}', "{$ns}\\Index::programAction");
            $map->get('program-block', '/programa2016/{block}', "{$ns}\\Index::programBlock");
            $map->get('program-chapter', '/programa2016/{block}/{chapter}', "{$ns}\\Index::programChapter");

            $map->get('repository', '/descargas', "{$ns}\\Index::repository");
            $map->get('blog-vello', '/{slug}', "{$ns}\\Index::redirect");

            return $routerContainer;
        };
    }
}
