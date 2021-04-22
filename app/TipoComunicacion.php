<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoComunicacion extends Model
{

    protected $table = 'tipo_comunicacion';
    public $timestamps = false;

    /**
     * $fillable para insertar de forma masiva
     */

    protected $fillable = [
        'id',
        'incidencia'
    ];
}
