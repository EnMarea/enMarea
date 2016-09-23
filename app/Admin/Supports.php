<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class Supports extends SimpleCrud
{
    public $title = 'Apoios a Luís Villares';
    public $description = 'Asinantes do manifesto de apoio';
    public $icon = 'action/thumb_up';

    public function getTable()
    {
        return $this->admin['app']['db']->supports;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'name' => $b->text()
                ->required()
                ->maxlength(255)
                ->label('Nome'),

            'dni' => $b->text()
                ->label('DNI'),

            'profession' => $b->text()
                ->required()
                ->label('Profesión'),

            'isInitial' => $b->checkbox()
                ->label('É un firmante inicial'),

            'isActive' => $b->checkbox()
                ->label('Amosar'),
        ]);
    }
}
