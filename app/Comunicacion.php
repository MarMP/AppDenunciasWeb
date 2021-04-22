<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunicacion extends Model
{
    protected $table = 'comunicaciones';
    public $timestamps = false;

    /**
     * $fillable para insertar de forma masiva
     */

    protected $fillable = [
        'id',
        'empleado',
        'tipo_comunicacion',
        'departamento',
        'mensaje_comunicacion',
        'estado'
    ];
}
