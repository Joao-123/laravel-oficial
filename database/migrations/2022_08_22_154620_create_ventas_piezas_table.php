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
        Schema::create('ventas_piezas', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('pieza_id');
            $table->unsignedBigInteger('mujer_id');
  
            $table->date('fecha');
            $table->time('hora_ingreso', $precision = 0);
            $table->time('hora_salida', $precision = 0);
            $table->integer('precio_total');
            $table->integer('descuento');
  
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('pieza_id')->references('id')->on('piezas');
            $table->foreign('mujer_id')->references('id')->on('mujeres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas_piezas');
    }
};
