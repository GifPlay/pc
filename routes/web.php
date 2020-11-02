<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth\login');
});

//Route::get('/home', 'HomeController')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Servicios
Route::resource('servicios', 'ServicioController');

//Dispositivos
Route::resource('dispositivos', 'DispositivoController');

//Componentes
Route::resource('componentes', 'ComponenteController');

//Tipos de servicio
Route::resource('tiposServicios', 'TipoServicioController');

//Tecnicos
Route::resource('tecnicos', 'TecnicoController');

//Propietarios
Route::resource('propietarios', 'PropietarioController');

//Servicios
Route::resource('servicios', 'ServicioController');

//Graficas
Route::get('graficas.graficarServicios', 'GraficaController@graficarServicios')->name('servicios.grafica');
Route::get('graficas.graficarTecnicos', 'GraficaController@graficarTecnicos')->name('tecnicos.grafica');
