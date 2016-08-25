<?php

namespace App\Admin;

use Folk\Entities\SimpleCrud;
use FormManager\Builder;

class Events extends SimpleCrud
{
    public $title = 'Eventos';
    public $description = 'Calendario de eventos';
    public $icon = 'image/collections';

    public function getTable()
    {
        return $this->admin['app']['db']->events;
    }

    public function getScheme(Builder $b)
    {
        return $b->group([
            'city' => $b->text()
                ->required()
                ->label('Localidade'),

            'place' => $b->text()
                ->required()
                ->label('Lugar'),

            'day' => $b->date()
                ->required()
                ->label('Día'),

            'hour' => $b->text()
                ->required()
                ->label('Hora de comezo'),

            'person' => $b->text()
                ->required()
                ->label('Persoas que asistirán'),

            'intro' => $b->html()
                ->label('Descripción do evento'),

            'isActive' => $b->checkbox()
                ->label('Amosar')
        ]);
    }
}