<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\Usuario;
use Illuminate\Http\Request;

class ProveedorController extends Controller {
    /**
     * Muestra una tabla con los proveedores
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                $proveedores = Proveedor::all();
                return view('proveedor.index', compact('proveedores'));
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Muestra un formulario para crear un proveedor
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                return view('proveedor.crear');
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Almacena los datos del proveedor, provenientes del formulario de creacion
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {

                $proveedor = new Proveedor;
                $proveedor->nit = $request->nit;
                $proveedor->nombreProveedor = $request->nombreProveedor;
                $proveedor->direccion = $request->direccion;
                $proveedor->telefono = $request->telefono;
                $proveedor->save();

                $proveedores = Proveedor::all();

                $mensaje = "Proveedor Creado Correctamente";

                return view('proveedor.index', compact('proveedores', 'mensaje'));
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Muestra un proveedor en particular, para confirmar la eliminacion
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                $proveedor = Proveedor::find($id);
                return view('proveedor.mostrar', compact('proveedor'));
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Muestra un formulario para la edicion del proveedor
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                $proveedor = Proveedor::find($id);
                return view('proveedor.editar', compact('proveedor'));
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

                $proveedor = Proveedor::find($id);
                $proveedor->nombreProveedor = $request->nombreProveedor;
                $proveedor->direccion = $request->direccion;
                $proveedor->telefono = $request->telefono;
                $proveedor->save();

                $proveedores = Proveedor::all();

                $mensaje = "Proveedor Actualizado Correctamente";

                return view('proveedor.index', compact('proveedores', 'mensaje'));
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Elimina (softDelete) el proveedor
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {

                $proveedor = Proveedor::find($id);

                $proveedor->delete();

                $proveedores = Proveedor::all();

                $mensaje = "Proveedor Eliminado Correctamente";

                return view('proveedor.index', compact('proveedores', 'mensaje'));
            }
        } else {
            return redirect("/");
        }
    }
}
