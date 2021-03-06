<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class Events extends SimpleCrud
{
    public $title = 'Eventos';
    public $description = 'Calendario de eventos';
    public $icon = 'action/event';

    public function getTable()
    {
        return $this->admin['app']['db']->events;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'city' => $b->text()
                ->required()
                ->maxlength(255)
                ->label('Localidade'),

            'place' => $b->text()
                ->required()
                ->maxlength(255)
                ->label('Lugar'),

            'day' => $b->date()
                ->required()
                ->label('Día'),

            'hour' => $b->text()
                ->required()
                ->label('Hora de comezo'),

            'person' => $b->text()
                ->required()
                ->label('Persoas que asistirán (separadas por coma)'),

            'intro' => $b->html()
                ->maxlength(255)
                ->label('Descripción do evento'),

            'isActive' => $b->checkbox()
                ->label('Amosar'),

            'isNotInHome' => $b->checkbox()
                ->label('Non amosar na portada'),
        ]);
    }
}
