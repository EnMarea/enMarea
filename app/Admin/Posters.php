<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class Posters extends SimpleCrud
{
    public $title = 'Posters';
    public $description = 'Posters de campaña para descargar';
    public $icon = 'image/picture_as_pdf';

    public function getTable()
    {
        return $this->admin['app']['db']->posters;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'title' => $b->text()
                ->required()
                ->maxlength(255)
                ->label('Título'),

            'file' => $b->fileUpload()
                ->data('config', [
                    'directory' => '../data/uploads/posters/file/',
                ])
                ->label('Arquivo (pdf ou jpg)'),

            'thumbFile' => $b->imageUpload()
                ->data('config', [
                    'directory' => '../data/uploads/posters/thumbFile/',
                ])
                ->label('Imaxe en miniatura'),

            'position' => $b->number()
                ->set('editable', true)
                ->required()
                ->label('Posición'),

            'isActive' => $b->checkbox()
                ->label('Amosar'),
        ]);
    }
}
