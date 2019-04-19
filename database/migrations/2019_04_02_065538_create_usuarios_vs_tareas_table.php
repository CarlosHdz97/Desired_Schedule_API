<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosVsTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_vs_tareas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedMediumInteger('usuario_id');
            $table->unsignedSmallInteger('tarea_id');
            $table->boolean('done');
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tarea_id')->references('id')->on('tareas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_vs_tareas');
    }
}
