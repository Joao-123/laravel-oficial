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
        Schema::create('ventas_mujeres', function (Blueprint $table) {
          $table->unsignedBigInteger('venta_id');
          $table->unsignedBigInteger('mujer_id');
          $table->string('manilla');
          // $table->enum('estado', ['pendiente', 'cancelado']);

          // $table->integer('cantidad');
          // $table->integer('precio_venta');
          // $table->integer('descuento');

          $table->foreign('venta_id')->references('id')->on('ventas');
          $table->foreign('mujer_id')->references('id')->on('mujeres');
          $table->index(['venta_id', 'mujer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas_mujeres');
    }
};
