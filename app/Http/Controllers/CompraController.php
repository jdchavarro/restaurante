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
                $ingredientes = Ingrediente::all();
                $proveedores = Proveedor::all();
                return view('compra.crear', compact('ingredientes', 'proveedores'));
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

                $compra = new Compra;
                $compra->numeroFactura = $request->numeroFactura;
                $compra->fechaCompra = $request->fechaCompra;
                $compra->total = 0;

                $proveedor = Proveedor::find($request->idProveedor);
                $compra->proveedor()->associate($proveedor);
                $compra->save();

                $ingredientes = Ingrediente::all();
                foreach ($ingredientes as $ingrediente) {

                    if ($request['precio' . $ingrediente->id] != "" && $request['cantidad' . $ingrediente->id] != "") {

                        $compra->total += ($request['precio' . $ingrediente->id]) * ($request['cantidad' . $ingrediente->id]);
                        $compra->ingredientes()->attach($ingrediente, [
                            'precio' => $request['precio' . $ingrediente->id],
                            'cantidad' => $request['cantidad' . $ingrediente->id]
                        ]);
                        $ingrediente->cantidadDisponible += $request['cantidad' . $ingrediente->id];
                        $ingrediente->save();
                    }
                }

                $compra->save();

                $mensaje = "Compra registrada Correctamente";
                $compras = Compra::all();
                return view('compra.index', compact('compras', 'mensaje'));
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
        if (session()->has('id')) {
            if ($this->esAdmin(Usuario::find(session('id')))) {
                /* $compra = Compra::find($id)->with(['ingrediente']); */
                $compra = Compra::find($id);
                $ingredientes = $compra->ingredientes()->get();
                return view('compra.mostrar', compact('compra', 'ingredientes'));
            } else {
                return redirect("/");
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
