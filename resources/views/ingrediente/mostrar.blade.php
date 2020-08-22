@extends('layouts.panelControl')

@section('areaPrincipal')

<h2 class="tituloSeccion">BORRAR INGREDIENTE</h2>

<div class="formulario">
    <form action="{{  asset('ingrediente/'.$ingrediente->id)  }}" method="post">
        @csrf

        @method("DELETE")

        <div class="form-group">
            <label for="nombreIngrediente">Nombre</label>
            <input type="text" class="form-control" readonly name="nombreIngrediente" id="nombreIngrediente"
                value="{{ $ingrediente->nombreIngrediente }}">
        </div>

        <div class=" form-group">
            <label for="unidadMedida">Unidad Medida</label>
            <input type="text" class="form-control" readonly name="unidadMedida" id="unidadMedida"
                value="{{ $ingrediente->unidadMedida }}">
        </div>

        <button type=" submit" class="btn btn-danger">ELIMINAR</button>
    </form>

</div>

@endsection