<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class Census extends SimpleCrud
{
    public $title = 'Censo';
    public $description = 'Lista de censo de En Marea';
    public $icon = 'action/subject';

    public function getTable()
    {
        return $this->admin['app']['db']->census;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'council_id' => $b->relationOne($this->admin->getEntity('Council'))
                ->label('Nome do concello'),

            'name' => $b->text()
                ->required()
                ->maxlength(255)
                ->label('Nome'),

            'dni' => $b->text()
                ->required()
                ->label('DNI'),

            'email' => $b->email()
                ->required()
                ->label('Email'),

            'phone' => $b->tel()
                ->required()
                ->label('Teléfono móbil'),
        ]);
    }
}
