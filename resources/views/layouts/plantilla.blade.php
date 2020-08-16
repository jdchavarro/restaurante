@include('layouts.head')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="cabecera">
    @yield('cabeza')
</div>

@yield('cuerpo')

<div class="pie">
    @yield('pie')
    <p>copyright restaurante app</p>
</div>


@include('layouts.foot')