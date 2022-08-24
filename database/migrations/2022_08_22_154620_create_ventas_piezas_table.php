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
            $table->unsignedBigInteger('usuarios_id');
            $table->unsignedBigInteger('piezas_id');
            $table->unsignedBigInteger('mujeres_id');
  
            $table->date('fecha');
            $table->time('hora_ingreso', $precision = 0);
            $table->time('hora_salida', $precision = 0);
            $table->integer('precio_total');
            $table->integer('descuento');
  
            $table->foreign('usuarios_id')->references('id')->on('usuarios');
            $table->foreign('piezas_id')->references('id')->on('piezas');
            $table->foreign('mujeres_id')->references('id')->on('mujeres');
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
