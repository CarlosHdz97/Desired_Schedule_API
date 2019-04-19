<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('curp',18)->unique();
            $table->string('apellido_paterno',60);
            $table->string('apellido_materno',60);
            $table->string('nombres',60);
            $table->string('celular',15)->unique();
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nivel_academico',60);
            $table->string('formacion_academica',60);
            $table->integer('horas_nombramiento',5)->autoIncrement(false);
            $table->string('dictamen_categoria_docente',60);
            $table->unsignedSmallInteger('rol_id');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
