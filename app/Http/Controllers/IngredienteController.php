<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\Ingrediente;
use App\Usuario;
use Illuminate\Http\Request;

class IngredienteController extends Controller {
    /**
     * Muestra una tabla con los ingredientes
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                $ingredientes = Ingrediente::all();
                return view('ingrediente.index', compact('ingredientes'));
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Muestra un formulario para crear un ingrediente
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                return view('ingrediente.crear');
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Almacena los datos del ingrediente, provenientes del formulario de creacion
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {

                $ingrediente = new Ingrediente;
                $ingrediente->nombreIngrediente = $request->nombreIngrediente;
                $ingrediente->cantidadDisponible = 0;
                $ingrediente->unidadMedida = $request->unidadMedida;
                $ingrediente->save();

                $ingredientes = Ingrediente::all();

                $mensaje = "Ingrediente Creado Correctamente";

                return view('ingrediente.index', compact('ingredientes', 'mensaje'));
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Muestra un ingrediente en particular, para confirmar la eliminacion
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                $ingrediente = Ingrediente::find($id);
                return view('ingrediente.mostrar', compact('ingrediente'));
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Muestra un formulario para la edicion del ingrediente
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                $ingrediente = Ingrediente::find($id);
                return view('ingrediente.editar', compact('ingrediente'));
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Actualiza en base de datos la informacion proveniente de edit
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {

                $ingrediente = Ingrediente::find($id);
                $ingrediente->nombreIngrediente = $request->nombreIngrediente;
                $ingrediente->unidadMedida = $request->unidadMedida;
                $ingrediente->save();

                $ingredientes = Ingrediente::all();

                $mensaje = "Ingrediente Actualizado Correctamente";

                return view('ingrediente.index', compact('ingredientes', 'mensaje'));
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Elimina (softDelete) el ingrediente
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {

                $ingrediente = Ingrediente::find($id);

                $ingrediente->delete();

                $ingredientes = Ingrediente::all();

                $mensaje = "Ingrediente Eliminado Correctamente";

                return view('ingrediente.index', compact('ingredientes', 'mensaje'));
            }
        } else {
            return redirect("/");
        }
    }
}
