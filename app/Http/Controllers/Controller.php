<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function esAdmin(Usuario $usuario) {
        return ($usuario->rol->nombreRol == "administrador") ? true : false;
    }

    public function tienePermiso() {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
