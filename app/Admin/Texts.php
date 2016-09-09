<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class Texts extends SimpleCrud
{
    public $title = 'Textos';
    public $description = 'Páxinas de textos corridos';
    public $icon = 'action/subject';

    public function getTable()
    {
        return $this->admin['app']['db']->texts;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'title' => $b->text()
                ->required()
                ->maxlength(255)
                ->label('Título'),

            'texts_id' => $b->relationOne($this)
                ->label('Dentro de...'),

            'name' => $b->text()
                ->required()
                ->maxlength(255)
                ->label('Identificador (non cambiar)'),

            'intro' => $b->html()
                ->label('Texto introductorio (opcional)'),

            'body' => $b->collectionMultiple([
                    'text' => [
                        'html' => $b->html()
                            ->label('Contido'),
                    ],

                    'video' => [
                        'code' => $b->textarea()
                            ->label('Código do vídeo'),
                    ],

                    'image' => [
                        'imageFile' => $b->imageUpload()
                            ->data('config', [
                                'directory' => '../data/uploads/texts/imageFile/',
                            ])
                            ->label('Imaxe'),

                        'isWide' => $b->checkbox()
                            ->label('Mostar a todo ancho'),
                    ],

                    'file' => [
                        'title' => $b->text()
                            ->label('Texto'),

                        'file' => $b->fileUpload()
                            ->data('config', [
                                'directory' => '../data/uploads/texts/file/',
                            ])
                            ->label('Arquivo'),
                    ],
                ])
                ->required(),
        ]);
    }
}
