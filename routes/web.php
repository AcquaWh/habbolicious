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
    return redirect()->route('index');
});
Route::get('/','HabboliciousController@index')->name('index');
Route::get('/noticias','HabboliciousController@noticias')->name('noticias');
Route::get('/blogs','HabboliciousController@blogs')->name('blogs');
Route::get('/loteria','HabboliciousController@loteria')->name('loteria');
Route::get('/catalogo','HabboliciousController@catalogo')->name('catalogo');
Route::get('/eventos','HabboliciousController@eventos')->name('eventos');
Route::get('/equipo','HabboliciousController@equipo')->name('equipo');
Route::get('/vacantes','HabboliciousController@vacantes')->name('vacantes');
Route::get('/utilidades','HabboliciousController@utilidades')->name('utilidades');
Auth::routes(['verify' => true]);
Route::get('/validar-usuario/{correo}','HabboliciousController@validarUsuario');
Route::get('/{usuario}','PerfilController@index')->middleware('verified')->name('perfil');
Route::post('/comentario-perfil/{id}','ComentarioPerfilController@store')->middleware('verified')->name('comentario-perfil.store');
Route::post('/likeperfil/{id}','PerfilController@likeperfil')->middleware('verified')->name('likeperfil');
Route::get('/contadorlikes/{id}','PerfilController@contadorlikes')->middleware('verified')->name('contadorlikes');
Route::get('/editar/{id}','PerfilController@edit')->middleware('verified')->name('perfil.edit');
Route::put('/actualizar/{id}','PerfilController@update')->middleware('verified')->name('perfil.update');
Route::post('/portada', 'SubirarchivoController@portada')->middleware('verified')->name('portada');
Route::post('/avatar', 'SubirarchivoController@avatar')->middleware('verified')->name('avatar');