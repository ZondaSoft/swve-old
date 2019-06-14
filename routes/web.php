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

// La ruta empresa es para datos fijos de la empresa
Route::get('/feriados/{id?}', 'FeriadosController@index')->name('home')->where('id', '[0-9]+');
Route::get('/feriados/add', 'FeriadosController@add')->name('home');
Route::get('/feriados/add/{id?}', 'FeriadosController@add')->name('home');
Route::post('/feriados/add', 'FeriadosController@store');
Route::post('/feriados/add/{id?}', 'FeriadosController@store');
Route::get('/feriados/edit/{id?}', 'FeriadosController@edit')->name('home');
Route::post('/feriados/edit/{id}', 'FeriadosController@update');
Route::get('/feriados/delete/{id}', 'FeriadosController@delete');
Route::get('/feriados/{id}/search', 'FeriadosController@search');
Route::get('/feriados/search', 'FeriadosController@search')->name('feriados.search');
Route::get('/feriados/{id}/search/search', 'FeriadosController@search');

Route::get('/feriadoscons', 'FeriadosController@retorno');
//Route::post('/feriados', 'FeriadosController@retorno');

// Rutas de Bajas
//Route::get('/bajas/{id?}', 'BajasController@index')->where('id', '[0-9]+');
Route::get('/bajas/{id?}/{direction?}', 'BajasController@index')->where(['id' => '[0-9]+', 'direction' => '[-1-9]+']);

// Rutas de Centros de costo
Route::get('/ccosto/{id?}', 'CcostoController@index')->where('id', '[0-9]+');
Route::get('/ccosto/add', 'CcostoController@add');
Route::post('/ccosto/add', 'CcostoController@store');
Route::get('/ccosto/edit/{id}', 'CcostoController@edit'); // ->name('home');
Route::post('/ccosto/edit/{id}', 'CcostoController@update'); // ->name('home');
Route::get('/ccosto/delete/{id}', 'CcostoController@delete'); // ->name('home');
Route::get('/ccosto/search', 'CcostoController@search')->name('ccosto.search');
Route::get('/ccosto/{id}/search', 'CcostoController@search');


// Rutas de Sectores
Route::get('/sectores/{id?}', 'SectoresController@index')->where('id', '[0-9]+');
Route::get('/sectores/add', 'SectoresController@add');
Route::post('/sectores/add', 'SectoresController@store');
Route::get('/sectores/edit/{id}', 'SectoresController@edit'); // ->name('home');
Route::post('/sectores/edit/{id}', 'SectoresController@update'); // ->name('home');
Route::get('/sectores/delete/{id}', 'SectoresController@delete'); // ->name('home');
Route::get('/sectores/search', 'SectoresController@search')->name('sectores.search');
Route::get('/sectores/{id}/search', 'SectoresController@search');


// Rutas de cuadrillas
Route::get('/cuadrillas/{id?}', 'CuadrillaController@index')->where('id', '[0-9]+');
Route::get('/cuadrillas/add', 'CuadrillaController@add');
Route::post('/cuadrillas/add', 'CuadrillaController@store');
Route::get('/cuadrillas/edit/{id}', 'CuadrillaController@edit'); // ->name('home');
Route::post('/cuadrillas/edit/{id}', 'CuadrillaController@update'); // ->name('home');
Route::get('/cuadrillas/search', 'CuadrillaController@search')->name('cuadrillas.search'); // ->name('home');
Route::get('/cuadrillas/search/{id}', 'CuadrillaController@search'); // ->name('home');

// Rutas de Codigos de novedades
Route::get('/codnoved/{id?}', 'CodNovedController@index')->where('id', '[0-9]+');
Route::get('/codnoved/add', 'CodNovedController@add');
Route::post('/codnoved/add', 'CodNovedController@store');
Route::get('/codnoved/edit/{id}', 'CodNovedController@edit'); // ->name('home');
Route::post('/codnoved/edit/{id}', 'CodNovedController@update'); // ->name('home');
Route::get('/codnoved/search', 'CodNovedController@search')->name('codnoved.search');
Route::get('/codnoved/search/{id}', 'CodNovedController@search'); // ->name('home');
Route::get('/codnoved/{id}/search', 'CodNovedController@search'); // ->name('home');
Route::get('/codnoved/search2', 'CodNovedController@search2')->name('codnoved.search2');

// Rutas de Patologias medicas
Route::get('/diagnos/{id?}', 'DiagnosController@index')->where('id', '[0-9]+');
Route::get('/diagnos/add', 'DiagnosController@add');
Route::post('/diagnos/add', 'DiagnosController@store');
Route::get('/diagnos/edit/{id}', 'DiagnosController@edit'); // ->name('home');
Route::post('/diagnos/edit/{id}', 'DiagnosController@update'); // ->name('home');
Route::get('/diagnos/search', 'DiagnosController@search')->name('diagnos.search');
Route::get('/diagnos/search/{id}', 'DiagnosController@search'); // ->name('home');
Route::get('/diagnos/{id}/search', 'DiagnosController@search'); // ->name('home');


// Rutas de Articulos
Route::get('/artmedicos/{id?}', 'ArtMedicosController@index')->where('id', '[0-9]+');
Route::get('/artmedicos/add', 'ArtMedicosController@add');
Route::post('/artmedicos/add', 'ArtMedicosController@store');
Route::get('/artmedicos/edit/{id}', 'ArtMedicosController@edit'); // ->name('home');
Route::post('/artmedicos/edit/{id}', 'ArtMedicosController@update'); // ->name('home');

// Rutas de Grupos empresarios
Route::get('/grupos/{id?}', 'GrupoController@index')->where('id', '[0-9]+');
Route::get('/grupos/add', 'GrupoController@add');
Route::post('/grupos/add', 'GrupoController@store');
Route::get('/grupos/edit/{id}', 'GrupoController@edit'); // ->name('home');
Route::post('/grupos/edit/{id}', 'GrupoController@update'); // ->name('home');
Route::get('/grupos/delete/{id}', 'GrupoController@delete'); // ->name('home');
Route::get('/grupos/search', 'GrupoController@search'); // ->name('home');
Route::get('/grupos/{id}/search', 'GrupoController@search'); // ->name('home');


// Rutas de modalidades
Route::get('/modalidades/{id?}', 'ModalidadesController@index')->where('id', '[0-9]+');
Route::get('/modalidades/add', 'ModalidadesController@add');
Route::post('/modalidades/add', 'ModalidadesController@store');
Route::get('/modalidades/edit/{id}', 'ModalidadesController@edit'); // ->name('home');
Route::post('/modalidades/edit/{id}', 'ModalidadesController@update'); // ->name('home');
Route::get('/modalidades/delete/{id}', 'ModalidadesController@delete'); // ->name('home');
Route::get('/modalidades/search', 'ModalidadesController@search')->name('modalidades.search');
Route::get('/modalidades/{id}/search', 'ModalidadesController@search'); // ->name('home');


// Rutas de convenios colectivos
Route::get('/convenios/{id?}', 'ConveniosController@index')->where('id', '[0-9]+');
Route::get('/convenios/add', 'ConveniosController@add');
Route::post('/convenios/add', 'ConveniosController@store');
Route::get('/convenios/edit/{id}', 'ConveniosController@edit');
Route::post('/convenios/edit/{id}', 'ConveniosController@update'); // ->name('home');
Route::get('/convenios/delete/{id}', 'ConveniosController@delete'); // ->name('home');
Route::get('/convenios/search', 'ConveniosController@search')->name('convenios.search');
Route::get('/convenios/{id}/search', 'ConveniosController@search'); // ->name('home');


// Rutas de categorias
Route::get('/categorias/{id?}', 'CategoriasController@index')->where('id', '[0-9]+');
Route::get('/categorias/add', 'CategoriasController@add');
Route::post('/categorias/add', 'CategoriasController@store');
Route::get('/categorias/edit/{id}', 'CategoriasController@edit'); // ->name('home');
Route::post('/categorias/edit/{id}', 'CategoriasController@update'); // ->name('home');
Route::get('/categorias/delete/{id}', 'CategoriasController@delete'); // ->name('home');
Route::get('/categorias/search', 'CategoriasController@search')->name('categorias.search');
Route::get('/categorias/{id}/search', 'CategoriasController@search'); // ->name('home');

// Rutas de jerarquias
Route::get('/jerarquias/{id?}', 'JerarquiasController@index')->where('id', '[0-9]+');
Route::get('/jerarquias/add', 'JerarquiasController@add');
Route::post('/jerarquias/add', 'JerarquiasController@store');
Route::get('/jerarquias/edit/{id}', 'JerarquiasController@edit'); // ->name('home');
Route::post('/jerarquias/edit/{id}', 'JerarquiasController@update'); // ->name('home');
Route::get('/jerarquias/delete/{id}', 'JerarquiasController@delete'); // ->name('home');
Route::get('/jerarquias/search', 'JerarquiasController@search')->name('jerarquias.search'); // ->name('home');
Route::get('/jerarquias/{id}/search', 'JerarquiasController@search'); // ->name('home');

// Rutas de obrass
Route::get('/obrass/{id?}', 'ObrassController@index')->where('id', '[0-9]+');
Route::get('/obrass/add', 'ObrassController@add');
Route::post('/obrass/add', 'ObrassController@store');
Route::get('/obrass/edit/{id}', 'ObrassController@edit'); // ->name('home');
Route::post('/obrass/edit/{id}', 'ObrassController@update'); // ->name('home');
Route::get('/obrass/delete/{id}', 'ObrassController@delete'); // ->name('home');
Route::get('/obrass/search', 'ObrassController@search')->name('obrass.search');
Route::get('/obrass/{id}/search', 'ObrassController@search'); // ->name('home');



// Rutas de sindicatos
Route::get('/sindicatos/{id?}', 'SindicatosController@index')->where('id', '[0-9]+');
Route::get('/sindicatos/add', 'SindicatosController@add');
Route::post('/sindicatos/add', 'SindicatosController@store');
Route::get('/sindicatos/edit/{id}', 'SindicatosController@edit'); // ->name('home');
Route::post('/sindicatos/edit/{id}', 'SindicatosController@update'); // ->name('home');
Route::get('/sindicatos/delete/{id}', 'SindicatosController@delete'); // ->name('home');
Route::get('/sindicatos/search', 'SindicatosController@search')->name('sindicatos.search');
Route::get('/sindicatos/{id}/search', 'SindicatosController@search'); // ->name('home');


// Rutas de provincias
Route::get('/provincias/{id?}', 'ProvinciasController@index')->where('id', '[0-9]+');
Route::get('/provincias/add', 'ProvinciasController@add');
Route::post('/provincias/add', 'ProvinciasController@store');
Route::get('/provincias/edit/{id}', 'ProvinciasController@edit'); // ->name('home');
Route::post('/provincias/edit/{id}', 'ProvinciasController@update'); // ->name('home');
Route::get('/provincias/delete/{id}', 'ProvinciasController@delete'); // ->name('home');
Route::get('/provincias/search', 'ProvinciasController@search')->name('provincias.search');
Route::get('/provincias/{id}/search', 'ProvinciasController@search'); // ->name('home');



// Rutas de asuntos
Route::get('/asuntos/{id?}', 'AsuntosController@index')->where('id', '[0-9]+');
Route::get('/asuntos/add', 'AsuntosController@add');
Route::post('/asuntos/add', 'AsuntosController@store');
Route::get('/asuntos/edit/{id}', 'AsuntosController@edit'); // ->name('home');
Route::post('/asuntos/edit/{id}', 'AsuntosController@update'); // ->name('home');
Route::get('/asuntos/delete/{id}', 'AsuntosController@delete'); // ->name('home');
Route::get('/asuntos/search', 'AsuntosController@search')->name('asuntos.search');
Route::get('/asuntos/{id}/search', 'AsuntosController@search'); // ->name('home');


// Rutas de asuntos
Route::get('/bancos/{id?}', 'BancosController@index')->where('id', '[0-9]+');
Route::get('/bancos/add', 'BancosController@add');
Route::post('/bancos/add', 'BancosController@store');
Route::get('/bancos/edit/{id}', 'BancosController@edit'); // ->name('home');
Route::post('/bancos/edit/{id}', 'BancosController@update'); // ->name('home');
Route::get('/bancos/delete/{id}', 'BancosController@delete'); // ->name('home');
Route::get('/bancos/search', 'BancosController@search')->name('bancos.search');
Route::get('/bancos/{id}/search', 'BancosController@search'); // ->name('home');


// Rutas de periodos
Route::get('/periodos/{id?}', 'PeriodosController@index')->where('id', '[0-9]+');
Route::get('/periodos/add', 'PeriodosController@add');
Route::post('/periodos/add', 'PeriodosController@store');
Route::get('/periodos/edit/{id}', 'PeriodosController@edit'); // ->name('home');
Route::post('/periodos/edit/{id}', 'PeriodosController@update'); // ->name('home');
Route::get('/periodos/delete/{id}', 'PeriodosController@delete'); // ->name('home');
Route::get('/periodos/activar/{id}', 'PeriodosController@activar'); // ->name('home');
Route::get('/periodos/search', 'PeriodosController@search'); // ->name('home');
Route::get('/periodos/{id}/search', 'PeriodosController@search'); // ->name('home');

Route::get('/periodos/search2/', 'PeriodosController@search2'); // ->name('home');
Route::get('/periodos/{id}/search2', 'PeriodosController@search2'); // ->name('home');

// Rutas de novedades (individual)
Route::get('/novedadesind/{id?}/{direction?}', 'NovedadesIndController@index')->where(['id' => '[0-9]+', 'direction' => '[-1-9]+']);
Route::get('/novedadesind/loadnovedades', 'NovedadesIndController@loadNovedades');
// where('direction', '[0-9]+');
Route::get('/novedadesind/{id?}', 'NovedadesIndController@index')->where('id', '[0-9]+');
Route::get('/novedadesind/add', 'NovedadesIndController@add');
Route::post('/novedadesind/add', 'NovedadesIndController@store');
Route::get('/novedadesind/edit/{id}', 'NovedadesIndController@edit'); // ->name('home');
Route::post('/novedadesind/edit/{id}', 'NovedadesIndController@update'); // ->name('home');
Route::get('/novedadesind/delete/{id}', 'NovedadesIndController@delete'); // ->name('home');
Route::post('/novedadesind/delete/{id}', 'NovedadesIndController@delete'); // ->name('home');

Route::get('/novedadesind/editModal/{id}', 'NovedadesIndController@editModal'); // ->name('home');

Route::get('/novedadesind/search', 'NovedadesIndController@search')->name('novedadesind');
Route::get('/novedadesind//search', 'NovedadesIndController@search')->name('novedadesind');

Route::get('/novedadesind/{id?}/{direction?}/search', 'NovedadesIndController@search')->name('novedadesind');
Route::get('/novedadesind/{id?}/search', 'NovedadesIndController@search')->name('novedadesind');

// Rutas de novedades (lista)
Route::get('/novedadeslist/{id?}', 'NovedadeslistController@index')->where('id', '[0-9]+');
Route::get('/novedadeslist/add', 'NovedadeslistController@add');
Route::post('/novedadeslist/add', 'NovedadeslistController@store');
Route::get('/novedadeslist/edit/{id}', 'NovedadeslistController@edit'); // ->name('home');
Route::post('/novedadeslist/edit/{id}', 'NovedadeslistController@update'); // ->name('home');
Route::post('/novedadeslist/search', 'NovedadeslistController@search'); // ->name('home');
Route::get('/novedadeslist/{id?}/{direction?}', 'NovedadeslistController@index')->where(['id' => '[0-9]+', 'direction' => '[-1-9]+']);

//Route::get('/novedadeslist/delete/{id}', 'NovedadeslistController@delete'); // ->name('home');
Route::post('/novedadeslist/delete/{id}', 'NovedadeslistController@delete'); // ->name('home');
Route::post('/novedadeslist/delete_drop/{id}/{page?}', 'NovedadeslistController@delete_drop'); // ->name('home');
Route::post('/novedadeslist/delete_drop/{id}', 'NovedadeslistController@delete_drop'); // ->name('home');

Route::get('/novedadeslist/search', 'NovedadeslistController@search'); // ->name('home');
Route::get('/novedadeslist/{id}/search', 'NovedadeslistController@search'); // ->name('home');


// Rutas de novedades (novedades)
Route::get('/novedades/{id?}', 'NovedadesController@index')->where('id', '[0-9]+');
Route::get('/novedades/add', 'NovedadesController@add');
Route::post('/novedades/add', 'NovedadesController@store');
Route::get('/novedades/edit/{id}', 'NovedadesController@edit'); // ->name('home');
Route::post('/novedades/edit/{id}', 'NovedadesController@update'); // ->name('home');
Route::get('/novedades/delete/{id}', 'NovedadesController@delete'); // ->name('home');
Route::get('/novedades/search', 'NovedadesController@search'); // ->name('home');
Route::get('/novedades/{id?}/{direction?}', 'NovedadesController@index')->where(['id' => '[0-9]+', 'direction' => '[-1-9]+']);
Route::get('/novedades/{id}/search', 'NovedadesController@search'); // ->name('home');

// Rutas de Historicos
Route::get('/historicoacc/{id?}', 'HistoricosController@accid')->where('id', '[0-9]+');
Route::get('/historicovac/{id?}', 'HistoricosController@vacac')->where('id', '[0-9]+');
Route::get('/historicoen/{id?}', 'HistoricosController@enfe')->where('id', '[0-9]+');

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
