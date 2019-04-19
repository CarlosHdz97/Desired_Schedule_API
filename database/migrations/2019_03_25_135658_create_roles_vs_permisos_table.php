<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesVsPermisosTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('roles_vs_permisos', function (Blueprint $table) {
            $table->unsignedSmallInteger('rol_id');
            $table->unsignedSmallInteger('permiso_id');
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
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