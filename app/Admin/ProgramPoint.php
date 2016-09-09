<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class ProgramPoint extends SimpleCrud
{
    public $title = 'Programa - Medidas transversais';
    public $description = 'As medidas transversais que se usan para destacar';
    public $icon = 'action/subject';

    public function getTable()
    {
        return $this->admin['app']['db']->programPoint;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'title' => $b->text()
                ->required()
                ->maxlength(255)
                ->label('Título'),

            'slug' => $b->text()
                ->maxlength(255)
                ->required()
                ->label('Id único (o que aparece na url)'),

            'text' => $b->html()
                ->label('Texto'),

            'position' => $b->number()
                ->set('editable', true)
                ->label('Posición'),

            'isActive' => $b->checkbox()
                ->label('Amosar'),
        ]);
    }
}
