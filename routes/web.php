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
Route::post('/noticias/agregar/comentario/{id}', 'NoticiasComentarioController@store')->middleware('verified')->name('noticomentario.store');
Route::get('/blogs','HabboliciousController@blogs')->name('blogs');
Route::get('/loteria','HabboliciousController@loteria')->name('loteria');
Route::get('/catalogo','HabboliciousController@catalogo')->name('catalogo');
Route::get('/eventos','HabboliciousController@eventos')->name('eventos');
Route::get('/equipo','HabboliciousController@equipo')->name('equipo');
Route::get('/vacantes','HabboliciousController@vacantes')->name('vacantes');
Route::get('/utilidades','HabboliciousController@utilidades')->name('utilidades');
Route::get('/normas','HabboliciousController@normas')->name('normas');
Route::get('/terminos','HabboliciousController@terminos')->name('terminos');
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
Route::post('/vacante/enviar','HabboliciousController@vacante')->middleware('verified')->name('vacante.enviar');
/* Administrador */
Route::get('/admin','AdminController@index')->middleware('verified')->name('admin.index');
Route::get('/admin/noticias','NoticiasController@index')->middleware('verified')->name('admin.noticias');
Route::get('/admin/crear-noticias/','NoticiasController@create')->middleware('verified')->name('admin.noticias.create');
Route::get('/admin/editar-noticias/{id}','NoticiasController@edit')->middleware('verified')->name('admin.noticias.edit');
Route::post('/admin/noticias/portada', 'NoticiasController@portada')->middleware('verified')->name('admin.noticias.subir');
Route::post('/admin/noticias/crear','NoticiasController@store')->middleware('verified')->name('admin.noticias.store');
Route::put('/admin/noticias/{id}','NoticiasController@update')->middleware('verified')->name('admin.noticias.update');
Route::delete('/admin/noticias/eliminar/{id}','NoticiasController@destroy')->middleware('verified')->name('admin.noticias.destroy');
Route::get('/admin/roles','RolesController@index')->middleware('verified')->name('admin.roles');
Route::put('/admin/roles/{id}','RolesController@update')->middleware('verified')->name('admin.roles.update');
Route::post('/admin/roles-sec/{id}','RolesController@secundario')->middleware('verified')->name('admin.roles.secundario');
Route::get('/admin/roles/crear','RolesController@create')->middleware('verified')->name('admin.roles.create');
Route::post('/admin/roles/crear-rol','RolesController@store')->middleware('verified')->name('admin.roles.store');
Route::delete('/admin/roles/usuario/{id}','RolesController@destroy')->middleware('verified')->name('admin.roles.destroy');
Route::delete('/admin/roles/eliminar/{id}','RolesController@destroyrol')->middleware('verified')->name('admin.roles.rango.destroy');
Route::get('/admin/vacantes','VacantesController@index')->middleware('verified')->name('admin.vacantes');
Route::get('/admin/vacantes/crear','VacantesController@create')->middleware('verified')->name('admin.vacantes.create');
Route::post('/admin/vacantes/guardar','VacantesController@store')->middleware('verified')->name('admin.vacantes.store');
Route::get('/admin/vacantes/{id}','VacantesController@edit')->middleware('verified')->name('admin.vacantes.edit');
Route::put('/admin/vacantes/editar/{id}','VacantesController@update')->middleware('verified')->name('admin.vacantes.update');
Route::delete('/admin/vacantes/eliminar/{id}','VacantesController@destroy')->middleware('verified')->name('admin.vacantes.destroy');
Route::get('/admin/eventos','EventosController@index')->middleware('verified')->name('admin.eventos');
Route::get('/admin/eventos/crear','EventosController@create')->middleware('verified')->name('admin.eventos.create');
Route::post('/admin/eventos/subir', 'EventosController@portada')->middleware('verified')->name('admin.eventos.subir');
Route::post('/admin/eventos/guardar','EventosController@store')->middleware('verified')->name('admin.eventos.store');
Auth::routes(['verify' => true]);