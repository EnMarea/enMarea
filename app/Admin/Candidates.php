<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class Candidates extends SimpleCrud
{
    public $title = 'Candidatura';
    public $description = 'Lista dos candidatos nas catro provincias';
    public $icon = 'action/account_circle';

    public function getTable()
    {
        return $this->admin['app']['db']->candidates;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'name' => $b->text()
                ->required()
                ->maxlength(255)
                ->label('Nome'),

            'bio' => $b->html()
                ->label('Biografía'),

            'imageFile' => $b->imageUpload()
                ->data('config', [
                    'directory' => '../data/uploads/candidates/imageFile/',
                ])
                ->label('Imaxe'),

            'province' => $b->select()
                ->options([
                    '' => 'Ningunha',
                    'acoruna' => 'A Coruña',
                    'lugo' => 'Lugo',
                    'ourense' => 'Ourense',
                    'pontevedra' => 'Pontevedra',
                ])
                ->label('Provincia'),

            'position' => $b->number()
                ->set('editable', true)
                ->required()
                ->label('Posición'),
        ]);
    }
}
