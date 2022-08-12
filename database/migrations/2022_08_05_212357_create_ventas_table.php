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
            $table->unsignedBigInteger('mesero_id');
            $table->decimal('total', $precision = 8, $scale = 2);

            $table->foreign('mesero_id')->references('id')->on('meseros');
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
