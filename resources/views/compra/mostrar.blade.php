@extends('layouts.panelControl')

@section('areaPrincipal')

<div id="mostrarCompra">
    {{ $compra->fechaCompra }}
    {{ $compra->numeroFactura }}
    {{ $compra->total }}
</div>

<div id="mostrarIngredientes">
    @foreach ($ingredientes as $ingrediente)
    {{ $ingrediente->nombreIngrediente }}
    {{ $ingrediente->pivot->precio }}
    {{ $ingrediente->pivot->cantidad }}
    <br>
    @endforeach
</div>

@endsection