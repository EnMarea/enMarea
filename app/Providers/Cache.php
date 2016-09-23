<?php

namespace App\Providers;

use Fol;
use Fol\ServiceProviderInterface;
use Stash\Driver\FileSystem;
use Stash\Pool;

class Cache implements ServiceProviderInterface
{
    public function register(Fol $app)
    {
        $app['cache'] = function ($app) {
        	return new Pool(new FileSystem([
        		'path' => $app->getPath('data/cache')
        	]));
        };
    }
}
