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

        <nav class="nav nav-tabs flex-column">
            <li class="nav-item"><a href="{{ asset('/proveedor') }}" class="nav-link">Proveedores</a></li>
            <li class="nav-item"><a href="{{ asset('/ingrediente') }}" class="nav-link">Ingredientes</a></li>
            <li class="nav-item"><a href="{{ asset('/compra') }}" class="nav-link">Compras</a></li>
            <li class="nav-item"><a href="{{ asset('/categoria') }}" class="nav-link">Categorias</a></li>
            <li class="nav-item"><a href="{{ asset('/producto') }}" class="nav-link">Productos</a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Inventario</a>
                <div class="dropdown-menu">
                    <a href="{{ asset('/producto/inventario') }}" class="dropdown-item">Producto</a><a
                        href="{{ asset('/adicion/inventario') }}" class="dropdown-item">Adicion</a>
                </div>
            </li>
            <li class="nav-item"><a href="{{ asset('/adicion') }}" class="nav-link">Adiciones</a></li>
        </nav>

        <div class="list-group">

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