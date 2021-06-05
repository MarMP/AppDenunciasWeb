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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas para manejar Departamentos
Route::get('ListarDepartamentos','DepartamentosController@index');
Route::post('AnadirDepartamento','DepartamentosController@store');
Route::put('ModificarDepartamento/{id}','DepartamentosController@update');
Route::delete('BorrarDepartamento/{id}','DepartamentosController@destroy');

//Rutas para manejar Tipos de comunicación
Route::get('ListarTipoComunicaciones','TipoComunicacionController@index');
Route::post('AnadirTipoComunicacion','TipoComunicacionController@store');
Route::put('ModificarTipoComunicacion/{id}','TipoComunicacionController@update');
Route::delete('BorrarTipoComunicacion/{id}','TipoComunicacionController@destroy');

//Rutas para manejar Gestión Usuarios de la APP Móvil
Route::get('ListarEmpleados','EmpleadoController@index');
Route::post('AnadirEmpleado', 'EmpleadoController@store');
Route::put('ModificarEmpleado/{id}', 'EmpleadoController@update');
Route::delete('BorrarEmpleado/{id}', 'EmpleadoController@destroy');

//Rutas para manejar Gestión de Administradores
Route::get('ListarAdministradores','AdministradorController@index');
Route::post('AnadirAdministrador', 'AdministradorController@store');
Route::put('ModificarAdministrador/{id}', 'AdministradorController@update');
Route::delete('BorrarAdministrador/{id}', 'AdministradorController@destroy');

//Rutas para manejar Comunicaciones
Route::get('ListarComunicaciones','ComunicacionController@index');
Route::put('ModificarComunicacion/{id}', 'ComunicacionController@update');



