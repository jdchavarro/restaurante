@extends('layouts.panelControl')

@section('areaPrincipal')

<a href="{{ asset('/categoria/create') }}" class="btn btn-success">+ CREAR</a>

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
                <th scope="col">OPCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nombreCategoria }}</td>
                <td>
                    <a href="{{ asset('categoria/'.$categoria->id.'/edit') }}">editar</a>
                    <a href="{{ asset('categoria/'.$categoria->id) }}">borrar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection