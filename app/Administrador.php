<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administradores';


    /**
     * $fillable para insertar de forma masiva 
     */

    protected $fillable = [
        'id',
        'nombre',
        'apellidos',
        'id_departamento',
        'email',
        'contrasena'
    ];
}
