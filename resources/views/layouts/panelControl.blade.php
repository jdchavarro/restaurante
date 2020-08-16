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
</head>

<body>
    <div class="cabecera">@yield('cabecera')</div>
    <div class="menuNavegacion">@yield('menuNavegacion')</div>
    <div class="areaPrincipal">@yield('areaPrincipal')</div>
    <div class="pie">@yield('pie')</div>

    {{-- Scripts --}}
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>