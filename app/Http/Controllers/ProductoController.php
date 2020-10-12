<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingrediente;
use App\Usuario;
use App\Producto;
use App\Categoria;

class ProductoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                $productos = Producto::all();
                return view('producto.index', compact('productos'));
            } else {
                return redirect("/");
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
                $categorias = Categoria::all();
                $ingredientes = Ingrediente::all();
                return view('producto.crear', compact('categorias', 'ingredientes'));
            } else {
                return redirect("/");
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

                $producto = new Producto;
                $producto->codigo = $request->codigo;
                $producto->nombreProducto = $request->nombreProducto;
                $producto->precio = $request->precio;
                $producto->cantidadDisponible = 0;
                $producto->preparacion = $request->preparacion;

                $categoria = Categoria::find($request->idCategoria);
                $producto->categoria()->associate($categoria);

                $producto->save();

                $ingredientes = Ingrediente::all();
                foreach ($ingredientes as $ingrediente) {
                    if ($request['cantidadIngrediente' . $ingrediente->id] != "" && $request['cantidadProducto' . $ingrediente->id] != "") {

                        $producto->ingredientes()->attach($ingrediente, [
                            'cantidadIngrediente' => $request['cantidadIngrediente' . $ingrediente->id],
                            'cantidadProducto' => $request['cantidadProducto' . $ingrediente->id]
                        ]);
                    }
                }

                $producto->save();

                $mensaje = "Producto creado Correctamente";
                $productos = Producto::all();
                return view('producto.index', compact('mensaje', 'productos'));
            } else {
                return redirect("/");
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
