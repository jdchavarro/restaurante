<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class LoginController extends Controller {

    public function index() {
        if (!session()->has('id')) {
            return view('login');
        } else {
            return redirect('/home');
        }
    }

    public function iniciarSesion(Request $request) {

        $usuario = Usuario::where('nombreUsuario', $request->nombreUsuario)->get();
        $mensajeError = "";

        if (count($usuario) > 0) {
            if ($usuario[0]->contrasena == $request->contrasena) {
                session(['id' => $usuario[0]->id]);
                return redirect("/home");
            } else {
                $mensajeError = "Contraseña incorrecta";
            }
        } else {
            $mensajeError = "Usuario no registrado";
        }

        return view('login', compact('mensajeError'));
    }

    public function cerrarSesion() {
        session()->flush();
        return redirect("/login");
    }

    public function home() {

        if (!session()->has('id')) {
            return redirect("/");
        } else {
            $usuario = Usuario::find(session('id'));

            switch ($usuario->rol->nombreRol) {
                case "administrador":
                    return view('administrador.indexAdministrador');
                    break;
                case "cajero":
                    return view('cajero');
                    break;
                case "contador":
                    return view('contador');
                    break;
                default:
                    return redirect('/logout');
                    break;
            }
        }
    }
}
