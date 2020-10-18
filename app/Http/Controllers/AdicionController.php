<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Adicion;
use App\Ingrediente;

class AdicionController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if ($this->tienePermiso()) {
            $adiciones = Adicion::all();
            return view('adicion.index', compact('adiciones'));
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
        if ($this->tienePermiso()) {
            $ingredientes = Ingrediente::all();
            return view('adicion.crear', compact('ingredientes'));
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
        if ($this->tienePermiso()) {
            $adicion = new Adicion;
            $adicion->nombreAdicion = $request->nombreAdicion;
            $adicion->precio = $request->precio;
            $adicion->cantidadDisponible = 0;
            $adicion->save();

            $ingredientes = Ingrediente::all();
            foreach ($ingredientes as $ingrediente) {
                if (
                    $request['cantidadIngrediente' . $ingrediente->id] != "" &&
                    $request['cantidadAdicion' . $ingrediente->id] != ""
                ) {
                    $adicion->ingredientes()->attach(
                        $ingrediente,
                        [
                            'cantidadIngrediente' => $request['cantidadIngrediente' . $ingrediente->id],
                            'cantidadAdicion' => $request['cantidadAdicion' . $ingrediente->id]
                        ]
                    );
                }
            }

            $adicion->save();
            $mensaje = "Adicion creada Correctamente";
            $adiciones = Adicion::all();
            return view('adicion.index', compact('mensaje', 'adiciones'));
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
