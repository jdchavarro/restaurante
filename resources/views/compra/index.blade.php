@extends('layouts.panelControl')

@section('areaPrincipal')

<a href="{{ asset('/compra/create') }}" class="btn btn-success">+ CREAR</a>

<div class="tablaMostrarRegistros">

    @if (!empty($mensaje))
    <div class="alert alert-success" id="alerta" role="alert">
        {{ $mensaje }}
    </div>
    @endif

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>FECHA</th>
                <th>PROVEEDOR</th>
                <th>TOTAL</th>
                <th>OPCIONES</th>
            </tr>
        <tbody>
            @foreach ($compras as $compra)
            <tr>
                <td>{{ $compra->fechaCompra }}</td>
                <td>{{ $compra->proveedor->nombreProveedor }}</td>
                <td>{{ $compra->total }}</td>
                <td>
                    <a href="{{ asset('compra/'.$compra->id) }}">ver</a>
                    <a href="{{ asset('compra/'.$compra->id.'/edit') }}">editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </thead>
    </table>


</div>

@endsection