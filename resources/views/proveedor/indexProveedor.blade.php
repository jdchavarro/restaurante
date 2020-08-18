@extends('layouts.panelControl')

@section('areaPrincipal')

<a href="{{ asset('/proveedor/create') }}" class="btn btn-success">+ CREAR</a>

<table>
    <tr>
        <th>NIT</th>
        <th>NOMBRE</th>
        <th>DIRECCION</th>
        <th>TELEFONO</th>
        <th>OPCIONES</th>
    </tr>
    @foreach ($proveedores as $proveedor)
    <tr>
        <td>{{ $proveedor->nit }}</td>
        <td>{{ $proveedor->nombreProveedor }}</td>
        <td>{{ $proveedor->direccion }}</td>
        <td>{{ $proveedor->telefono }}</td>
        <td>
            <a href="#">editar</a>
            <a href="#">borrar</a>
        </td>
    </tr>
    @endforeach
</table>

@endsection