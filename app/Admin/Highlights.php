<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class HighLights extends SimpleCrud
{
    public $title = 'Destacados';
    public $description = 'Destacados de portada';
    public $icon = 'image/collections';

    public function getTable()
    {
        return $this->admin['app']['db']->highlights;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'imageFile' => $b->imageUpload()
                ->data('config', [
                    'directory' => '../data/uploads/highlights/imageFile/'
                ])
                ->required()
                ->label('Imaxe'),

            'type' => $b->text()
                ->label('Tipo de link'),

            'title' => $b->text()
                ->required()
                ->label('Título'),

            'url' => $b->text()
                ->required()
                ->label('Enderezo web'),

            'province' => $b->select()
                ->options([
                    '' => 'Ningunha',
                    'acoruna' => 'A Coruña',
                    'lugo' => 'Lugo',
                    'ourense' => 'Ourense',
                    'pontevedra' => 'Pontevedra',
                ])
                ->label('Provincia'),

            'isActive' => $b->checkbox()
                ->label('Amosar'),
        ]);
    }
}