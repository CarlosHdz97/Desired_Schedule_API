<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisponibilidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibilidad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedMediumInteger('usuario_id');
            $table->unsignedSmallInteger('periodo_id');
            $table->tinyInteger('dia'); //[1,2,3,4,5] = Lunes, Martes, Miercoles, Jueves, Viernes
            $table->time('inicio');
            $table->time('fin');
            $table->boolean('turno');
            $table->boolean('disponible'); //Escoger un mejor nombre
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('periodo_id')->references('id')->on('periodos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disponibilidad');
    }
}
