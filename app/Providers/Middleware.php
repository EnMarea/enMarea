<?php

namespace App\Providers;

use Fol;
use Fol\ServiceProviderInterface;
use Relay\RelayBuilder;
use Psr7Middlewares\Middleware as M;

class Middleware implements ServiceProviderInterface
{
    public function register(Fol $app)
    {
        $app['middleware'] = function ($app) {
            return (new RelayBuilder())->newInstance([
                M::basePath($app->getUrlPath()),
                M::ClientIp(),
                M::trailingSlash(),
                M::FormatNegotiator(),
                /*
                M::ErrorHandler($app->getNamespace('Controllers\\Index::error'))
                    ->catchExceptions()
                    ->arguments($app),
                */
                M::imageTransformer([
                    'small.' => 'resizeCrop,380,230',
                    'normal.' => 'resize,900',
                    'landscape.' => 'resizeCrop,1200,600'
                ]),
                M::create('/uploads', function () use ($app) {
                    return M::readResponse($app->getPath('data'))->continueOnError();
                }),
                M::AuraRouter($app->get('router'))->arguments($app),
            ]);
        };
    }
}
