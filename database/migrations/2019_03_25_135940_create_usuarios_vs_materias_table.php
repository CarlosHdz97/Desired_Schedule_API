<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosVsMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedMediumInteger('usuario_id');
            $table->unsignedSmallInteger('materia_id');
            $table->tinyInteger('prioridad');
            $table->boolean('experiencia');
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('usuarios_vs_materias');
    }
}
