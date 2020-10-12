@include('layouts.head')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/panelControl.css') }}">

<div class="contenedor">

    <div class="cabecera">
        @yield('cabecera')
        <h1 class="tituloPagina">PANEL DE ADMINISTRACION</h1>
        <a href="{{ asset('/logout') }}">cerrar sesion</a>
    </div>

    <div class="menuNavegacion">
        @yield('menuNavegacion')

        <div class="list-group">
            <a href="{{ asset('/proveedor') }}" class="list-group-item list-group-item-action">Proveedores</a>
            <a href="{{ asset('/ingrediente') }}" class="list-group-item list-group-item-action">Ingredientes</a>
            <a href="{{ asset('/compra') }}" class="list-group-item list-group-item-action">Compras</a>
            <a href="{{ asset('/categoria') }}" class="list-group-item list-group-item-action">Categorias</a>
            <a href="{{ asset('/producto') }}" class="list-group-item list-group-item-action">Productos</a>
            <a href="" class="list-group-item list-group-item-action">Adiciones</a>
            <a href="" class="list-group-item list-group-item-action">Roles</a>
            <a href="" class="list-group-item list-group-item-action">Empleados</a>
            <a href="" class="list-group-item list-group-item-action">Usuarios</a>
            <a href="" class="list-group-item list-group-item-action">Mesas</a>
            <a href="" class="list-group-item list-group-item-action">Clientes</a>
            <a href="" class="list-group-item list-group-item-action">Ventas</a>
        </div>
    </div>

    <div class="areaPrincipal">
        @yield('areaPrincipal')
    </div>

    <div class="pie">
        @yield('pie')
        <p>copyright restaurante app</p>
    </div>
</div>

@include('layouts.foot')