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

Route::get('/series', 'SeriesController@index')->name('series');
Route::get('/series/criar', 'SeriesController@create')->name('criar_serie');
Route::post('/series/criar', 'SeriesController@store');
Route::post('/series/remover/{id}', 'SeriesController@destroy');
Route::post('/series/{id}/editarSerie', 'SeriesController@edit');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporada}/{serieId}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/autenticar', 'AutenticarController@index');
Route::post('/autenticar', 'AutenticarController@autenticar');

Route::get('/registrar', 'RegistrarController@create');
Route::post('/registrar', 'RegistrarController@store');

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/autenticar');
});
