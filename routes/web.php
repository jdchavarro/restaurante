<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (session()->has('id')) {
        return redirect('/home');
    } else {
        return view('index');
    }
});

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@iniciarSesion');
Route::get('/home', 'LoginController@home');
Route::get('/logout', 'LoginController@cerrarSesion');
Route::get('/producto/inventario', 'ProductoController@inventario');
Route::get('/adicion/inventario', 'AdicionController@inventario');

Route::resource('/proveedor', 'ProveedorController');
Route::resource('/empleado', 'EmpleadoController');
Route::resource('/rol', 'RolController');
Route::resource('/usuario', 'UsuarioController');
Route::resource('/ingrediente', 'IngredienteController');
Route::resource('/compra', 'CompraController');
Route::resource('/categoria', 'CategoriaController');
Route::resource('/producto', 'ProductoController');
Route::resource('/adicion', 'AdicionController');
