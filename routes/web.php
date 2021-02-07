<?php

Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::middleware('auth')->group(function () {

    Route::resource('proveedores','ProveedorController');
    Route::resource('empleados','EmpleadoController');
    Route::resource('clientes','ClienteController');
    Route::resource('categorias','CategoriaController');
    Route::resource('notificaciones','NotificacionController');
    Route::resource('alertas','AlertaController');
    Route::resource('ventas','VentaController');

});