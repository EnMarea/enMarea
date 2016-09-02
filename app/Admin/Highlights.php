<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class HighLights extends SimpleCrud
{
    public $title = 'Destacados';
    public $description = 'Destacados de portada';
    public $icon = 'action/view_module';

    public function getTable()
    {
        return $this->admin['app']['db']->highlights;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'imageFile' => $b->imageUpload()
                ->data('config', [
                    'directory' => '../data/uploads/highlights/imageFile/',
                ])
                ->label('Imaxe'),

            'type' => $b->text()
                ->maxlength(255)
                ->label('Tipo de link'),

            'title' => $b->text()
                ->maxlength(255)
                ->required()
                ->label('Título'),

            'url' => $b->text()
                ->maxlength(255)
                ->required()
                ->label('Enderezo web'),

            'isEmbed' => $b->checkbox()
                ->label('Incrustar o contido'),

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

            'position' => $b->number()
                ->set('editable', true)
                ->required()
                ->label('Posición'),
        ]);
    }
}
