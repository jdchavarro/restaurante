@extends('layouts.panelControl')

@section('areaPrincipal')

<h2 class="tituloSeccion">MODIFICAR INGREDIENTE</h2>

<div class="formulario">
    <form action="{{  asset('ingrediente/'.$ingrediente->id)  }}" method="post">
        @csrf

        @method("PUT")

        <div class="form-group">
            <label for="nombreIngrediente">Nombre</label>
            <input type="text" class="form-control" name="nombreIngrediente" id="nombreIngrediente"
                value="{{ $ingrediente->nombreIngrediente }}">
        </div>

        <div class=" form-group">
            <label for="unidadMedida">Unidad Medida</label>
            <input type="text" class="form-control" name="unidadMedida" id="unidadMedida"
                value="{{ $ingrediente->unidadMedida }}">
        </div>

        <button type=" submit" class="btn btn-success">MODIFICAR</button>
    </form>

</div>

@endsection