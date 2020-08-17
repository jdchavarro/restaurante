<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreProducto');
            $table->integer('precio');
            $table->integer('cantidadDisponible');
            $table->integer('categoria_id');
            $table->integer('codigo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('productos');
    }
}
