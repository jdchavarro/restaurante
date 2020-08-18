@extends('layouts.plantilla')

@section('cabeza')
<h1 class="tituloPagina">INICIAR SESION</h1>
@endsection

@section('cuerpo')
<form action="/login" method="post" id="formularioIniciarSesion">
    @csrf

    <div class="form-group">
        <label for="nombreUsuario">Nombre de Usuario</label>
        <input type="text" required autofocus class="form-control" id="nombreUsuario" name="nombreUsuario"
            aria-describedby="emailHelp" placeholder="Ingrese Nombre de Usuario">
    </div>
    <div class="form-group">
        <label for="contrasena">Contraseña</label>
        <input type="password" required class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña">
    </div>
    <button type="submit" class="btn btn-primary">Iniciar Sesion</button>

    @if (!empty($mensajeError))

    <div class="alert alert-danger" id="alerta" role="alert">
        {{ $mensajeError }}
    </div>

    @endif

</form>
@endsection

@section('pie')
@endsection