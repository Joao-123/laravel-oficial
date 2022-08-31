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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('costo');
            $table->integer('precio');
            $table->integer('costo_compania');
            $table->string('manilla');
            $table->integer('utilidad');
            $table->timestamps();

            // $table->id();
            // $table->string('nombre', 100);
            // $table->integer('costo');
            // $table->integer('precio');
            // $table->integer('costo_compania');
            // $table->string('manilla', 100);
            // $table->integer('utilidad');
            // $table->enum('estado', ['disponible', 'agotado', 'eliminado']);
            // $table->timestamps();

            // $table->integer('stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
