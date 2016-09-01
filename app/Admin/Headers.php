<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class Headers extends SimpleCrud
{
    public $title = 'Cabeceiras';
    public $description = 'Distintas cabeceiras para a portada';
    public $icon = 'editor/insert_emoticon';

    public function getTable()
    {
        return $this->admin['app']['db']->headers;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'imageFile' => $b->imageUpload()
                ->data('config', [
                    'directory' => '../data/uploads/headers/imageFile/',
                ])
                ->required()
                ->label('Imaxe de fondo'),

            'positionX' => $b->range()
                ->min(0)
                ->max(100)
                ->label('Posición horizontal da imaxe (porcentaxe 0-100%)'),

            'text' => $b->text()
                ->required()
                ->maxlength(255)
                ->label('Texto'),

            'url' => $b->url()
                ->maxlength(255)
                ->label('Url á que queres que vaia (opcional)'),

            'style' => $b->select()
                ->options([
                    'left' => 'Texto á esquerda',
                    'right' => 'Texto á dereita',
                ])
                ->label('Estilo'),

            'isActive' => $b->checkbox()
                ->label('Amosar'),
        ]);
    }
}
