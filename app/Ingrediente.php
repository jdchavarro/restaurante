<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingrediente extends Model {

    use SoftDeletes;

    protected $fillable = [
        "nombreIngrediente",
        "cantidadDisponible",
        "unidadMedida"
    ];
}
