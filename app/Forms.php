<?php

namespace App;

use App\App;
use FormManager\Builder as B;
use FormManager\InvalidValueException;
use IsoCodes\Nif;

class Forms
{
    public static function supports(App $app)
    {
        $db = $app->get('db');

        return B::form([
            'name' => B::text()
                ->wrapperAttr(['class' => 'form-field'])
                ->required()
                ->label('Nome e apelidos'),

            'profession' => B::text()
                ->wrapperAttr(['class' => 'form-field'])
                ->required()
                ->label('Profesión'),

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
                    if (!Nif::validate($input->val())) {
                        throw new InvalidValueException('O DNI non é válido. Comproba que os números e letra estan correctos');
                    }

                    $exists = $db->supports->count()
                        ->by('dni', $input->val())
                        ->limit(1)
                        ->run();

                    if ($exists) {
                        throw new InvalidValueException('Este DNI xa foi rexistrado anteriormente');
                        
                    }
                })
                ->label('DNI'),

            'accept' => B::checkbox()
                ->wrapperAttr(['class' => 'form-check'])
                ->required()
                ->label('Acepto que o meu nome se mostre nesta lista'),

            'submit' => B::submit()
                ->wrapperAttr(['class' => 'form-footer'])
                ->attr('class', 'button')
                ->label('Asina o manifesto')
        ])
        ->attr([
            'method' => 'post',
            'class' => 'form'
        ]);
    }
}
