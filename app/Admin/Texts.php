<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class Texts extends SimpleCrud
{
    public $title = 'Textos';
    public $description = 'Páxinas de textos corridos';
    public $icon = 'image/collections';

    public function getTable()
    {
        return $this->admin['app']['db']->texts;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'title' => $b->text()
                ->required()
                ->label('Título'),

            'name' => $b->text()
                ->required()
                ->label('Identificador (non cambiar)'),

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
                                'directory' => '../data/uploads/texts/imageFile/'
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