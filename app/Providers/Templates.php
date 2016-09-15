<?php

namespace App\Providers;

use Fol;
use Fol\ServiceProviderInterface;
use League\Plates\Engine;
use InlineSvg\Collection;

class Templates implements ServiceProviderInterface
{
    public function register(Fol $app)
    {
        $app['templates'] = function ($app) {
            $templates = new Engine($app->getPath('templates'));

            $templates->addData(['app' => $app]);

            $templates->registerFunction('asset', function () use ($app) {
                $url = call_user_func_array([$app, 'getUrl'], func_get_args());
                $ext = strrchr($url, '.');

                if ($ext === '.css' || $ext === '.js') {
                    return $url.'?15';
                }

                return $url;
            });

            $svg = Collection::fromPath($app->getPath('www/img/svg'));

            $templates->registerFunction('svg', function ($name) use ($svg) {
                return $svg->get($name);
            });

            $templates->registerFunction('url', function ($route, $attributes = []) use ($app) {
                $url = $app['router']->getGenerator()->generate($route, $attributes);

                return $app->getUrl($url);
            });

            return $templates;
        };
    }
}
