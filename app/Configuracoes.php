<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracoes extends Model
{
    protected $dates = ['inicioInscricao, fimInscricao'];

    protected $casts = [

        'inicioInscricao' => 'datetime:d/m/Y H:i',
        'fimInscricao' => 'datetime:d/m/Y H:i'
    ];
}
