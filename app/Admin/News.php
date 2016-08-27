<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class News extends SimpleCrud
{
    public $title = 'Novas';
    public $description = 'Noticias de actualidade';
    public $icon = 'image/collections';

    public function getTable()
    {
        return $this->admin['app']['db']->news;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'imageFile' => $b->imageUpload()
                ->data('config', [
                    'directory' => '../data/uploads/news/imageFile/'
                ])
                ->required()
                ->label('Imaxe'),

            'title' => $b->text()
                ->required()
                ->label('Título'),

            'createdAt' => $b->datetime()
                ->label('Data de creación'),

            'slug' => $b->text()
                ->required()
                ->label('Id único (o que aparece na url)'),

            'intro' => $b->html()
                ->label('Introducción'),

            'isActive' => $b->checkbox()
                ->label('Amosar'),

            'body' => $b->collectionMultiple([
                    'text' => [
                        'html' => $b->html()
                            ->label('Contido')
                    ],
                    'video' => [
                        'code' => $b->textarea()
                            ->label('Código do vídeo')
                    ],
                    'image' => [
                        'imageFile' => $b->imageUpload()
                            ->data('config', [
                                'directory' => '../data/uploads/news/imageFile/'
                            ])
                            ->label('Imaxe'),
                        'isWide' => $b->checkbox()
                            ->label('Mostar a todo ancho'),
                    ]
                ])
                ->required()
        ]);
    }
}