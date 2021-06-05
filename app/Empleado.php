<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    /**
     * $fillable para insertar de forma masiva
     */
    protected $fillable = [
        'id',
        'nombre',
        'apellidos',
        'id_departamento',
        'puesto',
        'email',
        'telefono',
        'password'
    ];
}
