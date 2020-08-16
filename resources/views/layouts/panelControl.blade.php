@include('layouts.head')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/panelControl.css') }}">

<div class="cabecera">@yield('cabecera')
    <h1 class="tituloPagina">PANEL DE {{ App\Usuario::find(session('id'))->rol->nombreRol }}</h1>
    <a href="{{ asset('/logout') }}">cerrar sesion</a>
</div>
<div class="menuNavegacion">@yield('menuNavegacion')</div>
<div class="areaPrincipal">@yield('areaPrincipal')</div>
<div class="pie">@yield('pie')</div>

@include('layouts.foot')