<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodosVsMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->string('usuario_id',11)->index();
            $table->unsignedSmallInteger('periodo_id');
            $table->unsignedSmallInteger('materia_id');
            $table->tinyInteger('dia'); //[1,2,3,4,5] = Lunes, Martes, Miercoles, Jueves, Viernes
            $table->time('inicio');
            $table->time('fin');
            $table->timestamps();
            $table->foreign('periodo_id')->references('id')->on('periodos')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodos_vs_materias');
    }
}
