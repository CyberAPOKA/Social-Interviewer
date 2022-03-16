<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Candidato extends Model implements Auditable
//'arquivo'
{
    use \OwenIt\Auditing\Auditable;
    
    protected $fillable = ['nome','datadenascimento','nomemae','cpf','identidade','endereco','email','numero','cidade','estado','cep','opcao'];
    protected $dates = ['datadenascimento'];
}
