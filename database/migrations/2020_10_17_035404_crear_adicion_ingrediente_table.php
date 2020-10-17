<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearAdicionIngredienteTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('adicion_ingrediente', function (Blueprint $table) {
            $table->id();
            $table->integer('adicion_id');
            $table->integer('ingrediente_id');
            $table->integer('cantidadIngrediente');
            $table->integer('cantidadAdicion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('adicion_ingrediente');
    }
}
