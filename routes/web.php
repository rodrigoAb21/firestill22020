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


    Route::get('herramientas/listaIngresos','HerramientaController@listaIngresos');
    Route::get('herramientas/nuevoIngreso','HerramientaController@nuevoIngreso');
    Route::post('herramientas/guardarIngreso','HerramientaController@guardarIngreso');
    Route::get('herramientas/verIngreso/{id}','HerramientaController@verIngreso');
    Route::delete('herramientas/eliminarIngreso/{id}','HerramientaController@eliminarIngreso');

    Route::get('herramientas/verAsignacion','HerramientaController@verAsignacion');
    Route::get('herramientas/nuevoIngreso','HerramientaController@nuevoIngreso');
    Route::get('herramientas/listaBajas','HerramientaController@listaBajas');
    Route::get('herramientas/listaAsignaciones','HerramientaController@listaAsignaciones');
    Route::get('herramientas/nuevaAsignacion','HerramientaController@nuevaAsignacion');
    Route::get('herramientas/reingreso','HerramientaController@reingreso');
    Route::get('herramientas/verIngreso','HerramientaController@verIngreso');

    Route::resource('herramientas','HerramientaController');

    Route::get('imonitoreo/listaContratos','MonitoreoController@listaContratos');
    Route::get('imonitoreo/nuevoContrato','MonitoreoController@nuevoContrato');
    Route::post('imonitoreo/guardarContrato','MonitoreoController@guardarContrato');
    Route::get('imonitoreo/editarContrato/{id}','MonitoreoController@editarContrato');
    Route::get('imonitoreo/verContrato/{id}','MonitoreoController@verContrato');
    Route::patch('imonitoreo/actualizarContrato/{id}','MonitoreoController@actualizarContrato');
    Route::delete('imonitoreo/eliminarContrato/{id}','MonitoreoController@eliminarContrato');

    Route::post('imonitoreo/guardarSucursal','MonitoreoController@guardarSucursal');
    Route::get('imonitoreo/verSucursal/{id}','MonitoreoController@verSucursal');
    Route::patch('imonitoreo/actualizarSucursal/{id}','MonitoreoController@actualizarSucursal');
    Route::delete('imonitoreo/eliminarSucursal/{id}','MonitoreoController@eliminarSucursal');

    Route::get('imonitoreo/nuevoEquipo/{sucursal_id}','MonitoreoController@nuevoEquipo');
    Route::get('imonitoreo/verEquipo/{id}','MonitoreoController@verEquipo');
    Route::post('imonitoreo/guardarEquipo','MonitoreoController@guardarEquipo');
    Route::get('imonitoreo/editarEquipo/{id}','MonitoreoController@editarEquipo');
    Route::patch('imonitoreo/actualizarEquipo/{id}','MonitoreoController@actualizarEquipo');
    Route::delete('imonitoreo/eliminarEquipo/{id}','MonitoreoController@eliminarEquipo');


    Route::get('imonitoreo/agenda','MonitoreoController@agenda');

});