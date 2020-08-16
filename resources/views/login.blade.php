<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RESTAURANTE</title>

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="cabecera">
        <h1 class="tituloPagina">INICIAR SESION</h1>
    </div>

    <div class="cuerpo">
        <form action="/login" method="post" id="formularioIniciarSesion">
            @csrf

            <div class="form-group">
                <label for="nombreUsuario">Nombre de Usuario</label>
                <input type="text" required class="form-control" id="nombreUsuario" name="nombreUsuario"
                    aria-describedby="emailHelp" placeholder="Ingrese Nombre de Usuario">
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" required class="form-control" id="contrasena" name="contrasena"
                    placeholder="Contraseña">
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesion</button>

            @if (!empty($mensajeError))

            <div class="alert alert-danger" id="alerta" role="alert">
                {{ $mensajeError }}
            </div>

            @endif

        </form>
    </div>

    <div class="pie">
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>