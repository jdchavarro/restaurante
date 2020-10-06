<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Ingrediente;
use App\Proveedor;
use App\Usuario;

class CompraController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                $compras = Compra::with(['proveedor' => function ($query) {
                    $query->withTrashed();
                }])->orderBy('fechaCompra', 'desc')->get();
                return view('compra.index', compact('compras'));
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

        $compra = new Compra;
        $compra->numeroFactura = 14;
        $compra->fechaCompra = date("Y-m-d");
        $compra->total = 15000;

        $proveedor = Proveedor::find(3);
        $compra->proveedor()->associate($proveedor);

        $compra->save();

        $ingredientes = Ingrediente::find(2);
        $compra->ingredientes()->attach($ingredientes, ['precio' => 2500, 'cantidad' => 3]);

        $ingredientes = Ingrediente::find(3);
        $compra->ingredientes()->attach($ingredientes, ['precio' => 3500, 'cantidad' => 5]);

        echo "hola mundo";

        /* $compra = Compra::find(2);
        echo $compra->ingredientes[0]->nombreIngrediente; */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
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
                /* $compra = Compra::find($id)->with(['ingrediente']); */
                $compra = Compra::find($id);
                $ingredientes = $compra->ingredientes()->get();
                return view('compra.show', compact('compra', 'ingredientes'));
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
