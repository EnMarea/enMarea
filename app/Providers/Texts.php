<?php

namespace App\Providers;

use Fol;
use Fol\ServiceProviderInterface;
use FlyCrud\Directory;
use FlyCrud\Formats\Yaml;

class Texts implements ServiceProviderInterface
{
    public function register(Fol $app)
    {
        $app['texts'] = function ($app) {
            return Directory::make($app->getPath('data/texts'), new Yaml());
        };
    }
}
