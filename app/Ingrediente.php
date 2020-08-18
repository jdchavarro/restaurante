<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model {
    protected $fillable = [
        "nombreIngrediente",
        "cantidadDisponible",
        "unidadMedida"
    ];
}
