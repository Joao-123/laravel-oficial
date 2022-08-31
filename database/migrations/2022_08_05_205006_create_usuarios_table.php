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
            $table->integer('ci')->unique()->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('cell')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            // $table->string('username', 100);
            // $table->string('nombres', 100);
            // $table->string('apellidos', 100);
            // $table->integer('edad');
            // $table->enum('estado', ['pendiente', 'activo', 'despedido']);
            // $table->unsignedBigInteger('rol_id');
            // $table->foreign('rol_id')->references('id')->on('roles');
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
