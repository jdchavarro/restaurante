<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {

    protected $fillable = [
        "nombreProducto",
        "precio",
        "cantidadDisponible",
        "categoria_id",
        "codigo"
    ];

    public function categoria() {
        return $this->belongsTo('App\Categoria');
    }

    public function ingredientes() {
        return $this->belongsToMany('App\Ingrediente');
    }
}
