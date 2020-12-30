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
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home');

Route::get('/figuraSolidaria', 'FiguraSolidariaController@index')->name('figuraSolidaria.index');
Route::get('/figuraSolidaria/agregar', 'FiguraSolidariaController@create')->name('figuraSolidaria.agregar');

Route::get('/escolaridad', 'EscolaridadController@index')->name('escolaridad.index');
Route::get('/escolaridad/agregar','EscolaridadController@create')->name('escolaridad.agregar');
Route::post('/escolaridad/guardar','EscolaridadController@store')->name('escolaridad.guardar');

Route::get('/municipio', 'MunicipioController@index')->name('municipio.index');
Route::get('/municipio/agregar', 'MunicipioController@create')->name('municipio.agregar');
Route::get('/municipio/editar/{id}', 'MunicipioController@edit')->name('municipio.editar');
Route::post('/municipio/guardar','MunicipioController@store')->name('municipio.guardar');
Route::put('/municipio/update/{id}','MunicipioController@update')->name('municipio.update');
Route::delete('/municipio/{id}','MunicipioController@destroy')->name('municipio.eliminar');

Route::get('/seguroMedico', 'SeguroMedicoController@index')->name('seguroMedico.index');
Route::get('/seguroMedico/agregar', 'SeguroMedicoController@create')->name('seguroMedico.agregar');
Route::get('/seguroMedico/editar/{id}', 'SeguroMedicoController@edit')->name('seguroMedico.editar');
Route::post('/seguroMedico/guardar','SeguroMedicoController@store')->name('seguroMedico.guardar');
Route::put('/seguroMedico/update/{id}','SeguroMedicoController@update')->name('seguroMedico.update');
Route::delete('/seguroMedico/{id}','SeguroMedicoController@destroy')->name('seguroMedico.eliminar');

Route::get('/ciudad', 'CiudadController@index')->name('ciudades.index');
Route::get('/ciudad/agregar', 'CiudadController@create')->name('ciudades.agregar');
Route::get('/ciudad/editar/{id}', 'CiudadController@edit')->name('ciudades.editar');
Route::post('/ciudad/guardar','CiudadController@store')->name('ciudades.guardar');
Route::put('/ciudad/update/{id}','CiudadController@update')->name('ciudades.update');
Route::delete('/ciudad/{id}','CiudadController@destroy')->name('ciudades.eliminar');

Route::get('/coordinacion-zona', 'CoordinacionZonaController@index')->name('coordinacionZona.index');
Route::get('/coordinacion-zona/agregar', 'CoordinacionZonaController@create')->name('coordinacionZona.agregar');
Route::post('/coordinacion-zona/guardar','CoordinacionZonaController@store')->name('coordinacionZona.guardar');
Route::delete('/coordinacion-zona/{id}','CoordinacionZonaController@destroy')->name('coordinacionZona.eliminar');

Route::get('/registroCivil', 'RegistroCivilController@index')->name('registroCivil.index');
Route::get('/registroCivil/agregar', 'RegistroCivilController@create')->name('registroCivil.agregar');
Route::get('/registroCivil/editar/{id}', 'RegistroCivilController@edit')->name('registroCivil.editar');
Route::post('/registroCivil/guardar','RegistroCivilController@store')->name('registroCivil.guardar');
Route::put('/registroCivil/update/{id}','RegistroCivilController@update')->name('registroCivil.update');
Route::delete('/registroCivil/{id}','RegistroCivilController@destroy')->name('registroCivil.eliminar');

Route::get('/roles', 'RolFiguraSolidariaController@index')->name('rolFiguraSolidaria.index');
Route::get('/roles/agregar', 'RolFiguraSolidariaController@create')->name('rolFiguraSolidaria.agregar');
Route::post('/roles/guardar','RolFiguraSolidariaController@store')->name('rolFiguraSolidaria.guardar');
Route::delete('/roles/{id}','RolFiguraSolidariaController@destroy')->name('rolFiguraSolidaria.eliminar');
//Route::group(['middleware' => ['auth']], function () { 
    //Route::get('home', 'HomeController@index');
    
//});