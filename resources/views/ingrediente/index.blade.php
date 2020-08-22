@extends('layouts.panelControl')

@section('areaPrincipal')

<a href="{{ asset('/ingrediente/create') }}" class="btn btn-success">+ CREAR</a>

<div class="tablaMostrarRegistros">

    @if (!empty($mensaje))

    <div class="alert alert-success" id="alerta" role="alert">
        {{ $mensaje }}
    </div>

    @endif
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NOMBRE</th>
                <th scope="col">UNIDAD MEDIDA</th>
                <th scope="col">OPCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ingredientes as $ingrediente)
            <tr>
                <td>{{ $ingrediente->nombreIngrediente }}</td>
                <td>{{ $ingrediente->unidadMedida }}</td>
                <td>
                    <a href="{{ asset('ingrediente/'.$ingrediente->id.'/edit') }}">editar</a>
                    <a href="{{ asset('ingrediente/'.$ingrediente->id) }}">borrar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection