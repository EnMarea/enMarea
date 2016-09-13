<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class Gallery extends SimpleCrud
{
    public $title = 'Galería de imaxes';
    public $description = 'Galería de imaxes en alta resolución para descarga';
    public $icon = 'image/camera_roll';

    public function getTable()
    {
        return $this->admin['app']['db']->gallery;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'title' => $b->text()
                ->required()
                ->maxlength(255)
                ->label('Título'),

            'imageFile' => $b->imageUpload()
                ->data('config', [
                    'directory' => '../data/uploads/gallery/imageFile/',
                ])
                ->label('Imaxe'),

            'position' => $b->number()
                ->set('editable', true)
                ->required()
                ->label('Posición'),

            'isActive' => $b->checkbox()
                ->label('Amosar'),
        ]);
    }
}
