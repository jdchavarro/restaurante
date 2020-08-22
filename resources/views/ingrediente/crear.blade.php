@extends('layouts.panelControl')

@section('areaPrincipal')

<h2 class="tituloSeccion">CREAR INGREDIENTE</h2>

<div class="formulario">
    <form action="/ingrediente" method="post">
        @csrf

        <div class="form-group">
            <label for="nombreIngrediente">Nombre</label>
            <input type="text" class="form-control" name="nombreIngrediente" id="nombreIngrediente">
        </div>

        <div class="form-group">
            <label for="unidadMedida">Unidad Medida</label>
            <input type="text" class="form-control" name="unidadMedida" id="unidadMedida">
        </div>

        <button type="submit" class="btn btn-success">CREAR</button>
    </form>

</div>

@endsection