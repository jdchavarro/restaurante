<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearIngredienteProductoTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ingrediente_producto', function (Blueprint $table) {
            $table->id();
            $table->integer('producto_id');
            $table->integer('ingrediente_id');
            $table->integer('cantidadIngrediente');
            $table->integer('cantidadProducto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('ingrediente_producto');
    }
}
