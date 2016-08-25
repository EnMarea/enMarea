<?php

namespace App\Controllers;

use App\App;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest as Request;

class Index
{
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
}
