@extends('layouts.panelControl')

@section('areaPrincipal')

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
                <th scope="col">CANTIDAD</th>
                <th scope="col">OPCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)

            <form action="{{ asset('producto/'.$producto->id) }}" method="post">
                @csrf
                @method("PUT")
                <tr>
                    <td>{{ $producto->codigo }}</td>
                    <td>{{ $producto->nombreProducto }}</td>
                    <td><input type="number" name="cantidadDisponible" value="{{ $producto->cantidadDisponible }}"></td>
                    <td>
                        <button type="submit" class="btn btn-success">GUARDAR</button>
                    </td>
                </tr>
            </form>
            @endforeach
        </tbody>
    </table>
</div>

@endsection