@extends('layouts.panelControl')

@section('areaPrincipal')
<h2 class="tituloSeccion">CREAR CATEGORIA</h2>

<div class="formulario">
    <form action="/categoria" method="post">
        @csrf

        <div class="form-group">
            <label for="nombreCategoria">Nombre</label>
            <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">CREAR</button>

    </form>
</div>
@endsection