@extends('layouts.panelControl')

@section('areaPrincipal')

<a href="{{ asset('/proveedor/create') }}" class="btn btn-success">+ CREAR</a>

<div class="tablaMostrarRegistros">

    @if (!empty($mensaje))

    <div class="alert alert-success" id="alerta" role="alert">
        {{ $mensaje }}
    </div>

    @endif
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>NIT</th>
                <th>NOMBRE</th>
                <th>DIRECCION</th>
                <th>TELEFONO</th>
                <th>OPCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
            <tr>
                <td>{{ $proveedor->nit }}</td>
                <td>{{ $proveedor->nombreProveedor }}</td>
                <td>{{ $proveedor->direccion }}</td>
                <td>{{ $proveedor->telefono }}</td>
                <td>
                    <a href="{{ asset('proveedor/'.$proveedor->id.'/edit') }}">editar</a>
                    <a href="{{ asset('proveedor/'.$proveedor->id) }}">borrar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection