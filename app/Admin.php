<?php

namespace App;

class Admin extends \Folk\Admin
{
    public $title = 'en marea';
    public $description = 'Xestion da web da campaña';

    public function __construct($url, App $app)
    {
        parent::__construct($url);

        $this['url'] = $app->getUrl();
        $this['app'] = $app;

        if (env('APP_ADMIN_AUTH_USERNAME')) {
            $this['users'] = [
                env('APP_ADMIN_AUTH_USERNAME') => env('APP_ADMIN_AUTH_PASSWORD'),
            ];
        }

        $this->setEntities([
            Admin\Highlights::class,
            Admin\News::class,
            Admin\Events::class,
            Admin\Headers::class,
            Admin\Texts::class,
            Admin\Candidates::class,
            Admin\ProgramPoint::class,
            Admin\ProgramBlock::class,
            Admin\ProgramChapter::class,
            Admin\ProgramAction::class,
            Admin\Gallery::class,
            Admin\Posters::class,
        ]);
    }
}
