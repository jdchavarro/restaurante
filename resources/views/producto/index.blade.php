@extends('layouts.panelControl')

@section('areaPrincipal')
<a href="{{ asset('/producto/create') }}" class="btn btn-success">+ CREAR</a>

<div class="tablaMostrarRegistros">

    @if (!empty($mensaje))

    <div class="alert alert-success" role="alert" id="alerta">
        {{ $mensaje }}
    </div>

    @endif

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">CODIGO</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">CANTIDAD DISPONIBLE</th>
                <th scope="col">PRECIO</th>
                <th scope="col">OPCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->codigo }}</td>
                <td>{{ $producto->nombreProducto }}</td>
                <td>{{ $producto->cantidadDisponible }}</td>
                <td>{{ $producto->precio }}</td>
                <td>
                    <a href="{{ asset('producto/'.$producto->id.'/edit') }}">editar</a>
                    <a href="{{ asset('producto/'.$producto->id) }}">borrar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection