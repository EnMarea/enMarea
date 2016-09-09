<?php

namespace App;

use App\App;
use FormManager\Builder as B;

class Forms
{
    public static function census(App $app)
    {
        $concellos = $app['db']->council->select()->run();

        return B::form([
            'name' => B::text()
                ->required()
                ->label('Nome e apelidos'),

            'dni' => B::text()
                ->required()
                ->maxlength(9)
                ->placeholder('Ex: 00000000X')
                ->label('DNI'),

            'email' => B::email()
                ->required()
                ->label('Correo electrónico'),

            'phone' => B::tel()
                ->required()
                ->maxlength(9)
                ->placeholder('Ex: 600000000')
                ->label('Teléfono móbil'),

            'council_id' => B::select()
                ->options($concellos->name)
                ->label('Concello'),

            'accept' => B::checkbox()
                ->required()
                ->label('Acepto as condicións'),

            'submit' => B::submit()
                ->label('Enviar')
        ])
        ->attr([
            'method' => 'post'
        ]);
    }
}
