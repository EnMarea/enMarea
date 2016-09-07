<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class ProgramAction extends SimpleCrud
{
    public $title = 'Programa - Medidas';
    public $description = 'Todas as medidas do programa';
    public $icon = 'action/subject';

    public function getTable()
    {
        return $this->admin['app']['db']->programAction;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'programChapter_id' => $b->relationOne($this->admin->getEntity('programChapter'))
                ->label('Capítulo ao que pertence'),

            'programPoint_id' => $b->relationOne($this->admin->getEntity('programPoint'))
                ->label('Metelo no tema transversal...'),

            'number' => $b->number()
                ->set('editable', true)
                ->label('Número de medida'),

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
