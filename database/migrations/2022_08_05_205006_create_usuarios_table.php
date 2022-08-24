<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('ci', 20)->unique();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('cell', 20);
            $table->integer('edad');
            $table->unsignedBigInteger('rol');
            $table->string('contrasenia');
            $table->enum('estado', ['pendiente', 'activo', 'despedido']);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('rol')->references('id')->on('roles');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
