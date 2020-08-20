<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\Usuario;
use Illuminate\Http\Request;

class ProveedorController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                $proveedores = Proveedor::all();
                return view('proveedor.indexProveedor', compact('proveedores'));
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                return view('proveedor.crearProveedor');
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Store a newly created resource in storage.
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

                $mensaje = "Proveedor Creador Correctamente";

                return view('proveedor.indexProveedor', compact('proveedores', 'mensaje'));
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                $proveedor = Proveedor::find($id);
                return view('proveedor.mostrarProveedor', compact('proveedor'));
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                $proveedor = Proveedor::find($id);
                return view('proveedor.editarProveedor', compact('proveedor'));
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Update the specified resource in storage.
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

                return view('proveedor.indexProveedor', compact('proveedores', 'mensaje'));
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Remove the specified resource from storage.
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

                return view('proveedor.indexProveedor', compact('proveedores', 'mensaje'));
            }
        } else {
            return redirect("/");
        }
    }
}
