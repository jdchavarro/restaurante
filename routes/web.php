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

Route::resource('/Empleado', 'EmpleadoController');
Route::resource('/Rol', 'RolController');
Route::resource('/Usuario', 'UsuarioController');
