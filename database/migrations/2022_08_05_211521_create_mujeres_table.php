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
        Schema::create('mujeres', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_chica');
            $table->integer('edad');
            $table->string('imagen');
            $table->timestamps();

            // $table->id();
            // $table->integer('ci')->unique();
            // $table->string('name');
            // $table->integer('cell');
            // $table->integer('edad');
            // $table->string('imagen', 100);
            // $table->enum('estado', ['activo', 'despedido']);
            // $table->rememberToken();
            // $table->timestamps();

            // $table->string('nombres', 100);
            // $table->string('apellidos', 100);
            // $table->string('contrasenia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mujeres');
    }
};
