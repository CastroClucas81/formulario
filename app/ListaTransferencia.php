<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaTransferencia extends Model
{
    public function form()
    {
    return $this->hasOne('App\Formulario','id','FKidformulario');
    }
}
