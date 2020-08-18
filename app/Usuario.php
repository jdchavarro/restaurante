<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

    protected $fillable = [
        "nombreUsuario",
        "contrasena",
        "rol_id",
        "empleado_id"
    ];

    /**
     * Asociamos el empleado con el usuario
     */
    public function empleado() {
        return $this->belongsTo('App\Empleado');
    }

    /**
     * Obtenemos el rol del propio usuario
     */
    public function rol() {
        return $this->belongsTo('App\Rol');
    }
}
