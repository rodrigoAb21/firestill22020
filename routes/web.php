<?php

use App\Events\ArduinoEvent;

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
    Route::resource('tipos','TipoClasificacionController');
    Route::resource('marcas','MarcaClasificacionController');
    Route::resource('notificaciones','NotificacionController');

    Route::resource('ventas','VentaController');

    // ------------------------------ HERRAMIENTA -------------------------------------------

    Route::get('herramientas/listaIngresos','HerramientaController@listaIngresos');
    Route::get('herramientas/nuevoIngreso','HerramientaController@nuevoIngreso');
    Route::post('herramientas/guardarIngreso','HerramientaController@guardarIngreso');
    Route::get('herramientas/verIngreso/{id}','HerramientaController@verIngreso');
    Route::delete('herramientas/eliminarIngreso/{id}','HerramientaController@eliminarIngreso');
    Route::get('herramientas/nuevoIngreso','HerramientaController@nuevoIngreso');


    // --------------------------------- BAJAS H -------------------------------------------
    Route::get('herramientas/listaBajas','HerramientaController@listaBajas');
    Route::get('herramientas/darBaja/{id}','HerramientaController@nuevaBaja');
    Route::post('herramientas/darBaja','HerramientaController@darBaja');
    Route::delete('herramientas/anularBaja/{id}','HerramientaController@anularBaja');

    // ------------------------------ ASIGNACIONES -------------------------------------------
    Route::get('herramientas/listaAsignaciones','HerramientaController@listaAsignaciones');
    Route::get('herramientas/nuevaAsignacion','HerramientaController@nuevaAsignacion');
    Route::post('herramientas/guardarAsignacion','HerramientaController@guardarAsignacion');
    Route::get('herramientas/reingreso/{id}','HerramientaController@reingreso');
    Route::post('herramientas/guardarReingreso/{id}','HerramientaController@guardarReingreso');
    Route::get('herramientas/verAsignacion/{id}','HerramientaController@verAsignacion');
    Route::delete('herramientas/eliminarAsignacion/{id}','HerramientaController@eliminarAsignacion');

    Route::resource('herramientas','HerramientaController');

    // ------------------------------ CONTRATO -------------------------------------------

    Route::get('imonitoreo/listaContratos','MonitoreoController@listaContratos');
    Route::get('imonitoreo/nuevoContrato','MonitoreoController@nuevoContrato');
    Route::post('imonitoreo/guardarContrato','MonitoreoController@guardarContrato');
    Route::post('imonitoreo/finalizarEdicion/{id}','MonitoreoController@finalizarEdicion');
    Route::get('imonitoreo/editarContrato/{id}','MonitoreoController@editarContrato');
    Route::get('imonitoreo/verContrato/{id}','MonitoreoController@verContrato');
    Route::patch('imonitoreo/actualizarContrato/{id}','MonitoreoController@actualizarContrato');
    Route::delete('imonitoreo/eliminarContrato/{id}','MonitoreoController@eliminarContrato');


    // ------------------------------ SUCURSAL -------------------------------------------
    Route::post('imonitoreo/guardarSucursal','MonitoreoController@guardarSucursal');
    Route::get('imonitoreo/verSucursal/{id}','MonitoreoController@verSucursal');
    Route::get('imonitoreo/editarSucursal/{id}','MonitoreoController@editarSucursal');
    Route::patch('imonitoreo/actualizarSucursal/{id}','MonitoreoController@actualizarSucursal');
    Route::delete('imonitoreo/eliminarSucursal/{id}','MonitoreoController@eliminarSucursal');


    // ------------------------------ EQUIPO -------------------------------------------
    Route::get('imonitoreo/nuevoEquipo/{sucursal_id}','MonitoreoController@nuevoEquipo');
    Route::get('imonitoreo/verEquipo/{id}','MonitoreoController@verEquipo');
    Route::post('imonitoreo/guardarEquipo','MonitoreoController@guardarEquipo');
    Route::get('imonitoreo/editarEquipo/{id}','MonitoreoController@editarEquipo');
    Route::patch('imonitoreo/actualizarEquipo/{id}','MonitoreoController@actualizarEquipo');
    Route::delete('imonitoreo/eliminarEquipo/{id}','MonitoreoController@eliminarEquipo');



    // ------------------------------- ALERTAS ------------------------------------------
    Route::get('alertas','AlertaController@index');
    Route::get('alertas/verEquipo/{alerta_id}/{equipo_id}','AlertaController@verEquipo');
    Route::get('alertas/marcarVista/{id}','AlertaController@marcarVista');
    Route::delete('alertas/{id}','AlertaController@destroy');


    // ------------------------------- INVENTARIO ------------------------------------------



    // --------------------------------- BAJAS P -------------------------------------------
    Route::get('inventario/listaBajas','InventarioController@listaBajas');
    Route::get('inventario/darBaja/{id}','InventarioController@nuevaBaja');
    Route::post('inventario/darBaja','InventarioController@darBaja');
    Route::delete('inventario/anularBaja/{id}','InventarioController@anularBaja');

    Route::resource('inventario', 'InventarioController');



});