<?php

namespace App;

use App\App;
use FormManager\Builder as B;
use FormManager\InvalidValueException;

class Forms
{
    public static function census(App $app)
    {
        $db = $app->get('db');

        $concellos = $db->council->select()->run();

        return B::form([
            'name' => B::text()
                ->wrapperAttr(['class' => 'form-field'])
                ->required()
                ->label('Nome e apelidos'),

            'dni' => B::text()
                ->wrapperAttr(['class' => 'form-field'])
                ->required()
                ->maxlength(9)
                ->placeholder('Ex: 00000000X')
                ->pattern('\d{8}[A-Za-z]')
                ->sanitize(function ($value) {
                    return strtoupper($value);
                })
                ->addValidator(function ($input) use ($db) {
                    $exists = $db->census->count()
                        ->by('dni', $input->val())
                        ->limit(1)
                        ->run();

                    if ($exists) {
                        throw new InvalidValueException('Este DNI xa foi rexistrado anteriormente');
                        
                    }
                })
                ->label('DNI'),

            'email' => B::email()
                ->wrapperAttr(['class' => 'form-field'])
                ->required()
                ->sanitize(function ($value) {
                    return strtolower($value);
                })
                ->addValidator(function ($input) use ($db) {
                    $exists = $db->census->count()
                        ->by('email', $input->val())
                        ->limit(1)
                        ->run();

                    if ($exists) {
                        throw new InvalidValueException('Este email xa foi rexistrado anteriormente');
                        
                    }
                })
                ->label('Correo electrónico'),

            'phone' => B::tel()
                ->wrapperAttr(['class' => 'form-field'])
                ->required()
                ->addValidator(function ($input) use ($db) {
                    $exists = $db->census->count()
                        ->by('phone', $input->val())
                        ->limit(1)
                        ->run();

                    if ($exists) {
                        throw new InvalidValueException('Este teléfono xa foi rexistrado anteriormente');
                        
                    }
                })
                ->maxlength(9)
                ->placeholder('Ex: 600000000')
                ->label('Teléfono móbil'),

            'council_id' => B::select()
                ->wrapperAttr(['class' => 'form-field'])
                ->options($concellos->name)
                ->label('Concello'),

            'accept' => B::checkbox()
                ->wrapperAttr(['class' => 'form-check'])
                ->required()
                ->label('Acepto as condicións'),

            'submit' => B::submit()
                ->wrapperAttr(['class' => 'form-footer'])
                ->attr('class', 'button')
                ->label('Rexistrarse')
        ])
        ->attr([
            'method' => 'post',
            'class' => 'form'
        ]);
    }
}
