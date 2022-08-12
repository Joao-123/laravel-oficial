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
        Schema::create('ventas_productos', function (Blueprint $table) {
          $table->unsignedBigInteger('ventas_id');
          $table->unsignedBigInteger('productos_id');

          $table->integer('cantidad');
          $table->integer('precio_venta');
          $table->integer('descuento');

          $table->foreign('ventas_id')->references('id')->on('ventas');
          $table->foreign('productos_id')->references('id')->on('productos');
          $table->index(['ventas_id', 'productos_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas_productos');
    }
};
