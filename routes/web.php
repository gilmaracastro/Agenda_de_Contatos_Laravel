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
Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'ContatoController@home')->name('home');

	Route::get('formulario', 'ContatoController@create')->name('home');	
	Route::post('/cadastro/salvar','ContatoController@save');
	Route::get('/visualizar','ContatoController@visualizar');
	Route::get('/cadastro/{id}/visualizar', 'ContatoController@visualizar');
	Route::get('/detalhes/{id}','ContatoController@detalhes');

	Route::get('/cadastro/{praticando}/editar','ContatoController@editar');
	Route::patch('/cadastro/{id}','ContatoController@update');
	Route::get('/cadastro/{id}/deletar','ContatoController@delete');

});
