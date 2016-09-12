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

                M::create(function () use ($app) {
                    return env('APP_DEV') ? M::whoops() : M::ErrorHandler($app->getNamespace('Controllers\\Index::error'))
                        ->catchExceptions()
                        ->arguments($app);
                }),

                M::create(function () {
                    return env('APP_DEV') ? false : M::expires();
                }),

                M::create('/uploads', function () use ($app) {
                    return env('APP_DEV') ? false : M::saveResponse($app->getPath('www'));
                }),

                M::imageTransformer([
                    'small.' => 'resizeCrop,380,230',
                    'normal.' => 'resize,900',
                    'gallery.' => 'resize,0,200',
                    'smalllandscape.' => 'resizeCrop,900,650,CROP_ENTROPY',
                    'landscape.' => 'resizeCrop,1200,650',
                    'biglandscape.' => 'resizeCrop,1600,800',
                    'cand-landscape.' => 'resizeCrop,1200,650,center,15%',
                    'cand-biglandscape.' => 'resizeCrop,1600,700,center,15%',
                    'cand-small.' => 'resizeCrop,380,300,center,top',
                    'cand.' => 'resize,380',
                ]),

                M::create('/uploads', function () use ($app) {
                    return M::readResponse($app->getPath('data'))->continueOnError();
                }),

                M::create('/img/candidatura', function () use ($app) {
                    return M::readResponse($app->getPath('assets'))->continueOnError();
                }),

                M::AuraRouter($app->get('router'))->arguments($app),
            ]);
        };
    }
}
