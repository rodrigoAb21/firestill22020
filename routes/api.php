<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', 'Api\Auth\LoginController@login');
Route::post('refresh', 'Api\Auth\LoginController@refresh');
Route::post('actualizarEquipo/{id}', 'Api\ApiController@actualizarEquipo');


Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'Api\Auth\LoginController@logout');
    Route::get('getUsuario', 'Api\ApiController@getUsuario');
    Route::get('clientes', 'Api\ApiController@getClientes');
});
Route::get('prueba', 'Api\ApiMovilController@listarClientesM');
Route::get('sucursalesp/{id}','Api\ApiMovilController@listarSucursalesM');
