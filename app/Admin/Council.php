<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class Council extends SimpleCrud
{
    public $title = 'Concellos';
    public $description = 'Lista de concellos galegos';
    public $icon = 'action/subject';

    public function getTable()
    {
        return $this->admin['app']['db']->council;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'name' => $b->text()
                ->required()
                ->maxlength(255)
                ->label('Nome'),

            'province' => $b->select()
                ->options([
                    'acoruna' => 'A Coruña',
                    'lugo' => 'Lugo',
                    'ourense' => 'Ourense',
                    'pontevedra' => 'Pontevedra',
                ])
                ->label('Provincia'),
        ]);
    }
}
