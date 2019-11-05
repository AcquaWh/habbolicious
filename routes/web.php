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
Route::get('/noticias/detalles/{id}','DetallesNoticiasController@show')->name('noticias.show');
Route::get('/blogs','HabboliciousController@blogs')->name('blogs');
Route::get('/loteria','HabboliciousController@loteria')->name('loteria');
Route::get('/catalogo','HabboliciousController@catalogo')->name('catalogo');
Route::get('/eventos','HabboliciousController@eventos')->name('eventos');
Route::get('/equipo','HabboliciousController@equipo')->name('equipo');
Route::get('/vacantes','HabboliciousController@vacantes')->name('vacantes');
Route::get('/utilidades','HabboliciousController@utilidades')->name('utilidades');
Route::get('/validar-usuario/{correo}','HabboliciousController@validarUsuario');
Route::get('/perfil/{usuario}','PerfilController@index')->middleware('verified')->name('perfil');
Route::post('/comentario-perfil/{id}','ComentarioPerfilController@store')->middleware('verified')->name('comentario-perfil.store');
Route::post('/likeperfil/{id}','PerfilController@likeperfil')->middleware('verified')->name('likeperfil');
Route::get('/contadorlikes/{id}','PerfilController@contadorlikes')->middleware('verified')->name('contadorlikes');
Route::get('/editar/{id}','PerfilController@edit')->middleware('verified')->name('perfil.edit');
Route::put('/actualizar/{id}','PerfilController@update')->middleware('verified')->name('perfil.update');
Route::post('/portada', 'SubirarchivoController@portada')->middleware('verified')->name('portada');
Route::post('/avatar', 'SubirarchivoController@avatar')->middleware('verified')->name('avatar');
Route::delete('/eliminar/comentario/{id}', 'ComentarioPerfilController@destroy')->middleware('verified')->name('comentario-perfil.destroy');
/* Administrador */
Route::get('/admin','AdminController@index')->middleware('verified')->name('admin.index');
Route::get('/admin/noticias','NoticiasController@index')->middleware('verified')->name('admin.noticias');
Route::get('/admin/crear-noticias/','NoticiasController@create')->middleware('verified')->name('admin.noticias.create');
Route::get('/admin/editar-noticias/{id}','NoticiasController@edit')->middleware('verified')->name('admin.noticias.edit');
Route::post('/admin/noticias/portada', 'NoticiasController@portada')->middleware('verified')->name('admin.noticias.subir');
Route::post('/admin/noticias/crear','NoticiasController@store')->middleware('verified')->name('admin.noticias.store');
Route::put('/admin/noticias/{id}','NoticiasController@update')->middleware('verified')->name('admin.noticias.update');
Route::delete('/admin/noticias/eliminar/{id}','NoticiasController@destroy')->middleware('verified')->name('admin.noticias.destroy');
Auth::routes(['verify' => true]);