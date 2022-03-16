<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Arquivo extends Model implements Auditable
//'arquivo'
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['comprovante','curriculo','certificado','comprovacao'];
}
