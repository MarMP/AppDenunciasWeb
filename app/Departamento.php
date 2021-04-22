<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    public $timestamps = false;

    /**
     * $fillable para insertar de forma masiva 
     */
    
    protected $fillable = [
        'id',
        'departamento'
    ]; 
}