<?php

namespace App\Controllers;

use App\App;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest as Request;
use Psr7Middlewares\Middleware;

class Index
{
    public function __construct(Request $request, Response $response, App $app)
    {
        if ($app['templates']->doesFunctionExist('img')) {
            return;
        }

        $imgGenerator = Middleware\ImageTransformer::getGenerator($request);

        $app['templates']->registerFunction('img', function ($url, $transform) use ($app, $imgGenerator) {
            $url = $imgGenerator($url, $transform);
            return $app->getUrl($url);
        });
    }

    /**
     * Páxina de portada
     */
    public function home(Request $request, Response $response, App $app)
    {
        $db = $app->get('db');

        $highlights = $db->highlights
            ->select()
            ->where('isActive = 1')
            ->run();

        return $app['templates']->render('pages/home', [
            'highlights' => $highlights,
        ]);
    }

    /**
     * Páxina de noticias
     */
    public function news(Request $request, Response $response, App $app)
    {
        $db = $app->get('db');

        $news = $db->news
            ->select()
            ->where('isActive = 1')
            ->orderBy('createdAt', 'DESC')
            ->limit(6)
            ->run();

        return $app['templates']->render('pages/news', [
            'news' => $news,
        ]);
    }

    /**
     * Páxina de noticia
     */
    public function newPermalink(Request $request, Response $response, App $app)
    {
    	$db = $app->get('db');
        $slug = $request->getAttribute('slug');

    	$new = $db->news
    		->select()
            ->one()
        	->where('isActive = 1')
            ->by('slug', $slug)
        	->run();

        if (!$new) {
            return $response->withStatus(404);
        }

        $latests = $db->news
            ->select()
            ->where('isActive = 1')
            //->where('id != :currentId', [':currentId' => $new->id])
            ->orderBy('createdAt', 'DESC')
            ->limit(3)
            ->run();

        return $app['templates']->render('pages/new', [
            'new' => $new,
            'latests' => $latests
        ]);
    }
}
