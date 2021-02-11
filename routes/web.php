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


    Route::get('imonitoreo/agenda','MonitoreoController@agenda');

});