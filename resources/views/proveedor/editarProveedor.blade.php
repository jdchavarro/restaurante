@extends('layouts.panelControl')

@section('areaPrincipal')

<h2 class="tituloSeccion">MODIFICAR PROVEEDOR</h2>

<div class="formulario">
    <form action="{{  asset('proveedor/'.$proveedor->id)  }}" method="post" id="formularioCrearProveedor">
        @csrf

        @method("PUT")

        <div class="form-group">
            <label for="nitProveedor">Nit</label>
            <input type="number" class="form-control" readonly name="nit" id="nitProveedor"
                value="{{ $proveedor->nit }}">
        </div>

        <div class="form-group">
            <label for="nombreProveedor">Nombre</label>
            <input type="text" class="form-control" name="nombreProveedor" id="nombreProveedor"
                value="{{ $proveedor->nombreProveedor }}">
        </div>

        <div class=" form-group">
            <label for="direccionProveedor">Direccion</label>
            <input type="text" class="form-control" name="direccion" id="direccionProveedor"
                value="{{ $proveedor->direccion }}">
        </div>

        <div class=" form-group">
            <label for="telefonoProveedor">Telefono</label>
            <input type="number" class="form-control" name="telefono" id="telefonoProveedor"
                value="{{ $proveedor->telefono }}">
        </div>

        <button type=" submit" class="btn btn-success">MODIFICAR</button>
    </form>

</div>

@endsection