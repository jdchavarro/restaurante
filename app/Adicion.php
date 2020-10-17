<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adicion extends Model {
    use SoftDeletes;

    protected $fillable = [
        "nombreAdicion",
        "precio",
        "cantidadDisponible"
    ];

    public function ingredientes() {
        return $this->belongsToMany('App\Ingrediente');
    }
}
