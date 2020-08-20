<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model {

    use SoftDeletes;

    protected $fillable = [
        "nombreProveedor",
        "nit",
        "telefono",
        "direccion"
    ];
}
