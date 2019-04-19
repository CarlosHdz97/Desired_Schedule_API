<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosVsAcademiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_vs_academias', function (Blueprint $table) {
            $table->unsignedMediumInteger('usuario_id');
            $table->unsignedSmallInteger('academia_id');
            $table->tinyInteger('prioridad');
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('academia_id')->references('id')->on('academias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_vs_academias');
    }
}
