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

Route::get('/', function () {
    return view('auth.login');	// view('welcome');
});

Auth::routes();

// La ruta Home se usa para crud e Legajos
//Route::get('/home/{id?}', 'HomeController@index')->name('home')->where('id', '[0-9]+');
Route::get('/home/{id?}/{direction?}', 'HomeController@index')->where(['id' => '[0-9]+', 'direction' => '[-1-9]+']);
Route::get('/home/add', 'HomeController@add')->name('home');
Route::post('/home/add', 'HomeController@store');
Route::get('/home/edit/{id}', 'HomeController@edit')->name('home')->where('id', '[0-9]+');
Route::post('/home/edit/{id}', 'HomeController@update');
Route::get('/home/search/', 'HomeController@search')->name('home.search');
Route::get('/home/{id?}/search/', 'HomeController@search')->name('search');
Route::get('/home/{id?}/{direction?}/search/', 'HomeController@search')->name('search');
Route::get('/home/delete/{id}', 'HomeController@delete'); // ->name('home');

Route::get('/test', 'HomeController@test');

// Busqueda de legajos
Route::get('/home/search2', 'HomeController@search2')->name('search2');
Route::get('/home/search3', 'HomeController@search3')->name('search3');

// La ruta empresa es para datos fijos de la empresa
Route::get('/datosempresa/{id?}', 'EmpresaController@index')->name('home')->where('id', '[0-9]+');
Route::get('/datosempresa/add', 'EmpresaController@add')->name('home');
Route::get('/datosempresa/add/{id?}', 'EmpresaController@add')->name('home');
Route::post('/datosempresa/add', 'EmpresaController@store');
Route::post('/datosempresa/add/{id?}', 'EmpresaController@store');
Route::post('/datosempresa/edit/{id}', 'EmpresaController@update');
Route::get('/datosempresa/{id}/search', 'EmpresaController@index');
Route::get('/datosempresa/search', 'EmpresaController@index');
Route::get('/datosempresa/{id}/search/search', 'EmpresaController@index');

// Rutas de Bajas
//Route::get('/bajas/{id?}', 'BajasController@index')->where('id', '[0-9]+');
Route::get('/bajas/{id?}/{direction?}', 'BajasController@index')->where(['id' => '[0-9]+', 'direction' => '[-1-9]+']);
Route::get('/bajas/add', 'BajasController@add')->name('bajas');
Route::post('/bajas/add', 'BajasController@store');
Route::get('/bajas/search', 'BajasController@search')->name('bajas.search');
Route::get('/bajas/edit/{id}', 'BajasController@edit')->name('bajas')->where('id', '[0-9]+');
Route::post('/bajas/edit/{id}', 'BajasController@update');


// Rutas de Grupos empresarios
Route::get('/tipos/{id?}', 'GruposController@index')->where('id', '[0-9]+');
Route::get('/tipos/add', 'GruposController@add');
Route::post('/tipos/add', 'GruposController@store');
Route::get('/tipos/edit/{id}', 'GruposController@edit'); // ->name('home');
Route::post('/tipos/edit/{id}', 'GruposController@update'); // ->name('home');
Route::get('/tipos/delete/{id}', 'GruposController@delete'); // ->name('home');
Route::get('/tipos/search', 'GruposController@search')->name('tipos.search');
Route::get('/tipos/{id}/search', 'GruposController@search'); // ->name('home');

// RTO
Route::get('/rto/add', 'RtoController@add');
Route::post('/rto/add', 'RtoController@store');
Route::get('/rto/edit/{id}', 'RtoController@edit'); // ->name('home');
Route::post('/rto/edit/{id}', 'RtoController@update'); // ->name('home');


// Estadisticas
Route::get('/estadisticas', 'EstadisticasController@index')->where('id', '[0-9]+');

// Rutas de informes (novedades)
Route::get('/infvehiculo', 'InfNovedController@index'); // ->name('home');
Route::get('/infnovedades', 'InfNovedController@novedades'); // ->name('home');
Route::get('/infembargos', 'InfNovedController@embargos'); // ->name('home');
Route::get('/inffichadas', 'InfNovedController@fichadas'); // ->name('home');

// Tareas para calendario
Route::resource('tasks', 'TasksController');

include __DIR__ . '/autocomplete.php';
