<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearCompraIngredienteTabla extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('compra_ingrediente', function (Blueprint $table) {
            $table->id();
            $table->integer('compra_id');
            $table->integer('ingrediente_id');
            $table->integer('precio');
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('compra_ingrediente');
    }
}
