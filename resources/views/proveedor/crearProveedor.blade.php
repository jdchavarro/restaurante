@extends('layouts.panelControl')

@section('areaPrincipal')

<h2 class="tituloSeccion">CREAR PROVEEDOR</h2>

<div class="formulario">
    <form action="/proveedor" method="post" id="formularioCrearProveedor">
        @csrf

        <div class="form-group">
            <label for="nitProveedor">Nit</label>
            <input type="number" class="form-control" name="nit" id="nitProveedor">
        </div>

        <div class="form-group">
            <label for="nombreProveedor">Nombre</label>
            <input type="text" class="form-control" name="nombreProveedor" id="nombreProveedor">
        </div>

        <div class="form-group">
            <label for="direccionProveedor">Direccion</label>
            <input type="text" class="form-control" name="direccion" id="direccionProveedor">
        </div>

        <div class="form-group">
            <label for="telefonoProveedor">Telefono</label>
            <input type="number" class="form-control" name="telefono" id="telefonoProveedor">
        </div>

        <button type="submit" class="btn btn-success">CREAR</button>
    </form>

</div>

@endsection