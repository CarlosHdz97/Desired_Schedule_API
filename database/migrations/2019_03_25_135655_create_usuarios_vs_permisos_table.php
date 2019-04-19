<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosVsPermisosTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('usuarios_vs_permisos', function (Blueprint $table) {
            $table->unsignedMediumInteger('usuario_id');
            $table->unsignedSmallInteger('permiso_id');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('permiso_id')->references('id')->on('permisos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('usuarios_vs_permisos');
    }
}
