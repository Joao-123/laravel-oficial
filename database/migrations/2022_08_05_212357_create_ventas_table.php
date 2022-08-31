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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_venta');
            $table->unsignedBigInteger('usuario_id');
            $table->decimal('total', $precision = 8, $scale = 2);
            // $table->decimal('ganancia_casa', $precision = 8, $scale = 2);
            // $table->decimal('ganancia_mujeres', $precision = 8, $scale = 2);
            // $table->decimal('utilidad_venta', $precision = 8, $scale = 2);

            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->timestamps();
        });
        
        // $table->index(['account_id', 'created_at']);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
