<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class ProgramChapter extends SimpleCrud
{
    public $title = 'Programa - Capítulos';
    public $description = 'Os capítulos nos que se ordenan as medidas';
    public $icon = 'action/subject';

    public function getTable()
    {
        return $this->admin['app']['db']->programChapter;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'programBlock_id' => $b->relationOne($this->admin->getEntity('programBlock'))
                ->label('Bloque ao que pertence'),
                
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
