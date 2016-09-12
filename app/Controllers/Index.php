<?php

namespace App\Controllers;

use App\App;
use App\Forms;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest as Request;
use Psr7Middlewares\Middleware;
use Zend\Diactoros\Response\RedirectResponse;

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
     * Páxina de portada.
     */
    public function home(Request $request, Response $response, App $app)
    {
        $db = $app->get('db');

        $highlights = $db->highlights
            ->select()
            ->where('isActive = 1')
            ->orderBy('position')
            ->run();

        $header = $db->headers
            ->select()
            ->one()
            ->where('isActive = 1')
            ->orderBy('RAND()')
            ->run();

        $events = $db->events
            ->select()
            ->where('isActive = 1')
            ->where('isNotInHome = 0')
            ->where('DATE(`day`) = DATE(NOW())')
            ->orderBy('day,hour')
            ->run();

        return $app['templates']->render('pages/home', [
            'highlights' => $highlights,
            'header' => $header,
            'events' => $events,
        ]);
    }

    /**
     * Páxina de noticias.
     */
    public function news(Request $request, Response $response, App $app)
    {
        $db = $app->get('db');
        $query = $request->getQueryParams();

        $currPage = (empty($query['p']) ? 1 : (int) $query['p']) ?: 1;
        $itemsPage = 12;

        $news = $db->news
            ->select()
            ->where('isActive = 1')
            ->orderBy('createdAt', 'DESC')
            ->limit($itemsPage + 1)
            ->offset(($currPage * $itemsPage) - $itemsPage)
            ->run();

        $nextPage = false;

        if ($news->count() > $itemsPage) {
            $arr = iterator_to_array($news);
            end($arr);
            unset($news[key($arr)]);

            $nextPage = $currPage + 1;
        }

        if (Middleware\FormatNegotiator::getFormat($request) === 'xml') {
            return $app['templates']->render('pages/news.rss', [
                'news' => $news,
            ]);
        }

        return $app['templates']->render('pages/news', [
            'news' => $news,
            'nextPage' => $nextPage,
        ]);
    }

    /**
     * Páxina de noticia.
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
            ->where('id != :currentId', [':currentId' => $new->id])
            ->orderBy('createdAt', 'DESC')
            ->limit(3)
            ->run();

        return $app['templates']->render('pages/new', [
            'new' => $new,
            'latests' => $latests,
        ]);
    }

    /**
     * Páxina de eventos.
     */
    public function events(Request $request, Response $response, App $app)
    {
        $db = $app->get('db');

        $events = $db->events
            ->select()
            ->where('isActive = 1')
            ->orderBy('day', 'ASC')
            ->orderBy('hour', 'ASC')
            ->run();

        return $app['templates']->render('pages/events', [
            'events' => $events,
        ]);
    }

    /**
     * Páxina de candidatos.
     */
    public function candidates(Request $request, Response $response, App $app)
    {
        $db = $app->get('db');

        $candidates = $db->candidates
            ->select()
            ->orderBy('position ASC')
            ->run();

        return $app['templates']->render('pages/candidates', [
            'candidates' => $candidates,
        ]);
    }

    /**
     * Privacidade.
     */
    public function privacy(Request $request, Response $response, App $app)
    {
        return $this->text('privacidade', $request, $response, $app);
    }

    /**
     * Contacto.
     */
    public function contact(Request $request, Response $response, App $app)
    {
        return $this->text('contacto', $request, $response, $app);
    }

    /**
     * En marea.
     */
    public function about(Request $request, Response $response, App $app)
    {
        $app['templates']->addData(['menu' => 'about'], 'layouts/default');

        return $this->text('enmarea', $request, $response, $app);
    }

    /**
     * Biografía.
     */
    public function bio(Request $request, Response $response, App $app)
    {
        return $this->text('biografia', $request, $response, $app);
    }

    /**
     * Devolve unha páxina de texto corrido.
     */
    private function text($name, Request $request, Response $response, App $app)
    {
        $db = $app->get('db');

        $text = $db->texts
            ->select()
            ->one()
            ->by('name', $name)
            ->run();

        if (!$text) {
            return $response->withStatus(404);
        }

        $menu = $text->texts;
        $subText = $request->getAttribute('slug');

        if ($subText) {
            $text = $db->texts
                ->select()
                ->one()
                ->by('name', $subText)
                ->relatedWith($text)
                ->run();

            if (!$text) {
                return $response->withStatus(404);
            }
        }

        return $app['templates']->render('pages/text', [
            'text' => $text,
            'menu' => $menu,
            'subText' => $subText,
        ]);
    }

    /**
     * Rutas que coinciden coa web antiga.
     */
    public function redirect(Request $request, Response $response, App $app)
    {
        $slug = $request->getAttribute('slug');

        $db = $app->get('db');

        $new = $db->news
            ->count()
            ->by('slug', $slug)
            ->limit(1)
            ->run();

        if (!$new) {
            return $response->withStatus(404);
        }

        $url = $app['router']->getGenerator()->generate('new', ['slug' => $slug]);

        return new RedirectResponse($app->getUrl($url));
    }

    /**
     * Páxina de erro.
     */
    public function error(Request $request, Response $response, App $app)
    {
        switch ($response->getStatusCode()) {
            case 404:
                return $app['templates']->render('pages/error', [
                    'texts' => $app->get('texts')['404'],
                ]);
                break;

            default:
                return $app['templates']->render('pages/error', [
                    'texts' => $app->get('texts')['500'],
                ]);
        }
    }

    /**
     * Portada co programa.
     */
    public function program(Request $request, Response $response, App $app)
    {
        $db = $app->get('db');

        $blocks = $db->programBlock
            ->select()
            ->where('isActive = 1')
            ->orderBy('position')
            ->run();

        $text = $db->texts
            ->select()
            ->one()
            ->by('name', 'programa')
            ->run();

        return $app['templates']->render('pages/program', [
            'blocks' => $blocks,
            'text' => $text,
        ]);
    }

    /**
     * Bloque do programa.
     */
    public function programBlock(Request $request, Response $response, App $app)
    {
        $db = $app->get('db');

        $block = $db->programBlock
            ->select()
            ->one()
            ->where('isActive = 1')
            ->by('slug', $request->getAttribute('block'))
            ->run();

        if (!$block) {
            return $response->withStatus(404);
        }

        $chapters = $block->programChapter()
            ->where('isActive = 1')
            ->orderBy('position')
            ->run();

        $blocks = $db->programBlock
            ->select()
            ->where('isActive = 1')
            ->orderBy('position')
            ->run();

        return $app['templates']->render('pages/program-block', [
            'block' => $block,
            'blocks' => $blocks,
            'chapters' => $chapters,
        ]);
    }

    /**
     * Capítulo do programa.
     */
    public function programChapter(Request $request, Response $response, App $app)
    {
        $db = $app->get('db');

        $block = $db->programBlock
            ->select()
            ->one()
            ->where('isActive = 1')
            ->by('slug', $request->getAttribute('block'))
            ->run();

        if (!$block) {
            return $response->withStatus(404);
        }

        $chapter = $block->programChapter()
            ->relatedWith($block)
            ->one()
            ->where('isActive = 1')
            ->by('slug', $request->getAttribute('chapter'))
            ->run();

        if (!$chapter) {
            return $response->withStatus(404);
        }

        $actions = $chapter->programAction()
            ->where('isActive = 1')
            ->orderBy('position')
            ->run();

        $blocks = $db->programBlock
            ->select()
            ->where('isActive = 1')
            ->orderBy('position')
            ->run();

        return $app['templates']->render('pages/program-chapter', [
            'block' => $block,
            'blocks' => $blocks,
            'chapter' => $chapter,
            'actions' => $actions,
        ]);
    }

    /**
     * Medida do programa.
     */
    public function programAction(Request $request, Response $response, App $app)
    {
        $db = $app->get('db');

        $action = $db->programAction
            ->select()
            ->one()
            ->where('isActive = 1')
            ->by('number', $request->getAttribute('number'))
            ->run();

        if (!$action
         || !$action->programChapter
         || !$action->programChapter->isActive
         || !$action->programChapter->programBlock
         || !$action->programChapter->programBlock->isActive
        ) {
            return $response->withStatus(404);
        }

        $blocks = $db->programBlock
            ->select()
            ->where('isActive = 1')
            ->orderBy('position')
            ->run();

        return $app['templates']->render('pages/program-action', [
            'action' => $action,
            'blocks' => $blocks,
        ]);
    }

    /**
     * Formulario do censo.
     */
    public function census(Request $request, Response $response, App $app)
    {
        $form = Forms::census($app);

        return $app['templates']->render('pages/census', [
            'form' => $form,
        ]);
    }

    /**
     * Gardar os datos do censo.
     */
    public function censusSave(Request $request, Response $response, App $app)
    {
        $form = Forms::census($app);

        $form->loadFromPsr7($request);

        if (!$form->validate()) {
            return $app['templates']->render('pages/census', [
                'form' => $form,
            ]);
        }

        $db = $app->get('db');

        $val = $form->val();

        $db->census->create([
            'name' => $val['name'],
            'dni' => $val['dni'],
            'email' => $val['email'],
            'phone' => $val['phone'],
            'council_id' => $val['council_id'],
        ])->save();

        return '!OK';
    }
}
