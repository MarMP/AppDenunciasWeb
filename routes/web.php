<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes(); Todas las rutas de auth

Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes(['register' => false]); //Desactiva la opción de register

//Route::get('/home', 'HomeController@index')->name('home');

/* Vistas home cuando el usuario inicia sesión
   Gestión de rutas según tipo de usuario: Superadministrador o administrador
 * Mostrará un menú diferente para cada uno de ellos */

Route::get('/inicioSuperAdmin', 'SuperAdminController@index');

//Route::get('/home', 'EsAdminController@index');

Route::get('/inicioAdmin', 'EsAdminController@index');

/*Gestiona el perfil de usuario */
Route::get('/mi-perfil', function () {
    return view('perfil');
});

/* Dos rutas para la vista y otra para la ruta posterior.*/
Route::get('perfil', 'ChangePasswordController@index');
Route::post('perfil', 'ChangePasswordController@store')->name('change.password');

/**
 * Permite actualizar las páginas del menú sin dar error
 */

//Route::view('/{path?}', 'welcome');
Route::view('/home', 'inicioAdmin');
Route::view('/home', 'inicioSuperAdmin');
Route::view('/departamento', 'inicioAdmin');
Route::view('/departamento', 'inicioSuperAdmin');
Route::view('/tipoComunicacion', 'inicioAdmin');
Route::view('/tipoComunicacion', 'inicioSuperAdmin');
Route::view('/gestionEmpleados', 'inicioAdmin');
Route::view('/gestionEmpleados', 'inicioSuperAdmin');
Route::view('/gestionAcceso', 'inicioSuperAdmin');
Route::view('/gestionAdministradores', 'inicioSuperAdmin');
Route::view('/comunicaciones', 'inicioSuperAdmin');
Route::view('/calendario', 'inicioAdmin');
Route::view('/calendario', 'inicioSuperAdmin');

