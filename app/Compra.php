<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model {

    protected $fillable = [
        "numeroFactura",
        "fechaCompra",
        "total",
        "proveedor_id"
    ];

    public function proveedor() {
        return $this->belongsTo('App\Proveedor');
    }


    public function ingredientes() {
        return $this->belongsToMany('App\Ingrediente')->withPivot('id', 'precio', 'cantidad');
    }
}
