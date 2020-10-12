<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usuario;
use App\Categoria;

class CategoriaController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                $categorias = Categoria::all();
                return view('categoria.index', compact('categorias'));
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
                return view('categoria.crear');
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

                $categoria = new Categoria;
                $categoria->nombreCategoria = $request->nombreCategoria;
                $categoria->save();

                $categorias = Categoria::all();
                $mensaje = "Categoria creada Correctamente";
                return view('categoria.index', compact('categorias', 'mensaje'));
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
