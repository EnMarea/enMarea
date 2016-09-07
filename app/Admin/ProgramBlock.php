<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class ProgramBlock extends SimpleCrud
{
    public $title = 'Programa - Bloques';
    public $description = 'Os bloques principais do programa';
    public $icon = 'action/subject';

    public function getTable()
    {
        return $this->admin['app']['db']->programBlock;
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
