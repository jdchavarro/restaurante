@extends('layouts.plantilla')

@section('cabeza')
<h1 class="tituloPagina">PAGINA DE INICIO</h1>
@endsection

@section('cuerpo')
<a href="{{ asset('/login')}}">Iniciar Sesion</a>
@endsection

@section('pie')

@endsection