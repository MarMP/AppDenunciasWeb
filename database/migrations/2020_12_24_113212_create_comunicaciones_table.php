<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunicaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('incidencia')->unsigned();
            $table->foreign('incidencia')->references('id')->on('tipo_comunicacion');
            $table->bigInteger('id_departamento')->unsigned();
            $table->foreign('id_departamento')->references('id')->on('departamentos');
            $table->bigInteger('empleado')->unsigned();
            $table->foreign('empleado')->references('id')->on('empleados');
            $table->text('mensaje');
            $table->integer('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comunicaciones');
    }
}
