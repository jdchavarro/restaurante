<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model {
    protected $fillable = [
        "nombreProveedor",
        "nit",
        "telefono",
        "direccion"
    ];
}
