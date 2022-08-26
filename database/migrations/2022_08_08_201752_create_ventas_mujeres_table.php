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
          $table->unsignedBigInteger('ventas_id');
          $table->unsignedBigInteger('mujeres_id');
          $table->string('manilla', 100);
          $table->enum('estado', ['pendiente', 'cancelado']);

          // $table->integer('cantidad');
          // $table->integer('precio_venta');
          // $table->integer('descuento');

          $table->foreign('ventas_id')->references('id')->on('ventas');
          $table->foreign('mujeres_id')->references('id')->on('mujeres');
          $table->index(['ventas_id', 'mujeres_id']);
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
