@extends('layouts.panelControl')

@section('areaPrincipal')
<a href="{{ asset('/adicion/create') }} " class="btn btn-success">+ CREAR</a>

<div class="tablaMostrarRegistros">
    @if (!empty($mensaje))
    <div class="alert alert-success" role="alert" id="alerta">
        {{ $mensaje }}
    </div>
    @endif

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NOMBRE</td>
                <th scope="col">PRECIO</td>
                <th scope="col">CANTIDAD</td>
                <th scope="col">OPCIONES</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($adiciones as $adicion)
            <tr>
                <td>{{ $adicion->nombreAdicion }}</td>
                <td>{{ $adicion->precio }}</td>
                <td>{{ $adicion->cantidadDisponible }}</td>
                <td>
                    <a href="{{ asset('adicion/'.$adicion->id.'/edit') }}">editar</a>
                    <a href="{{ asset('adicion/'.$adicion->id) }}">borrar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection