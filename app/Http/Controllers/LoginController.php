<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class LoginController extends Controller {

    public function index() {
        return view('login');
    }

    public function iniciarSesion(Request $request) {

        $usuario = Usuario::where('nombreUsuario', $request->nombreUsuario)->get();
        $mensajeError = "";

        if (count($usuario) > 0) {
            if ($usuario[0]->contrasena == $request->contrasena) {
                switch ($usuario[0]->rol->nombreRol) {
                    case "administrador":
                        //return view('administrador');
                        return redirect("/home/" . $usuario[0]);
                        break;
                    case "cajero":
                        return view('cajero');
                        break;
                    case "contador":
                        return view('contador');
                        break;
                    default:
                        $mensajeError = "Ops! tuve un problema encontrando tu rol, intenta nuevamente";
                        break;
                }
            } else {
                $mensajeError = "Contraseña incorrecta";
            }
        } else {
            $mensajeError = "Usuario no registrado";
        }

        return view('login', compact('mensajeError'));
    }

    public function home($usuario) {
        echo $usuario->nombre;
    }
}
