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
Route::post('/noticias/agregar/comentario/{id}', 'NoticiasComentarioController@store')->name('noticomentario.store');
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
Route::get('/perfil/{usuario}','PerfilController@index')->name('perfil');
Route::post('/comentario-perfil/{id}','ComentarioPerfilController@store')->name('comentario-perfil.store');
Route::post('/likeperfil/{id}','PerfilController@likeperfil')->name('likeperfil');
Route::get('/contadorlikes/{id}','PerfilController@contadorlikes')->name('contadorlikes');
Route::get('/editar/{id}','PerfilController@edit')->name('perfil.edit');
Route::put('/actualizar/{id}','PerfilController@update')->name('perfil.update');
Route::post('/portada', 'SubirarchivoController@portada')->name('portada');
Route::post('/avatar', 'SubirarchivoController@avatar')->name('avatar');
Route::delete('/eliminar/comentario/{id}', 'ComentarioPerfilController@destroy')->name('comentario-perfil.destroy');
Route::post('/vacante/enviar','HabboliciousController@vacante')->name('vacante.enviar');

/* Administrador */
Route::get('/admin','AdminController@index')->middleware('ChecarAdmin','ChecarCoordinador','ChecarDesarrollo','ChecarInformacion','ChecarRadio','ChecarConcursos','ChecarMarketing','ChecarEventos','ChecarGuias','ChecarDiseño','ChecarModeracion','ChecarCatalogo','ChecarHelpers')->name('admin.index');
Route::get('/admin/noticias','NoticiasController@index')->middleware('ChecarAdmin','ChecarDesarrollo','ChecarInformacion')->name('admin.noticias');
Route::get('/admin/crear-noticias/','NoticiasController@create')->middleware('ChecarAdmin','ChecarDesarrollo','ChecarInformacion')->name('admin.noticias.create');
Route::get('/admin/editar-noticias/{id}','NoticiasController@edit')->middleware('ChecarAdmin','ChecarDesarrollo','ChecarInformacion')->name('admin.noticias.edit');
Route::post('/admin/noticias/portada', 'NoticiasController@portada')->middleware('ChecarAdmin','ChecarDesarrollo','ChecarInformacion')->name('admin.noticias.subir');
Route::post('/admin/noticias/crear','NoticiasController@store')->middleware('ChecarAdmin','ChecarDesarrollo','ChecarInformacion')->name('admin.noticias.store');
Route::put('/admin/noticias/{id}','NoticiasController@update')->middleware('ChecarAdmin','ChecarDesarrollo','ChecarInformacion')->name('admin.noticias.update');
Route::delete('/admin/noticias/eliminar/{id}','NoticiasController@destroy')->middleware('ChecarAdmin','ChecarDesarrollo','ChecarInformacion')->name('admin.noticias.destroy');

Route::get('/admin/roles','RolesController@index')->middleware('ChecarAdmin','ChecarDesarrollo')->name('admin.roles');
Route::put('/admin/roles/{id}','RolesController@update')->middleware('ChecarAdmin','ChecarDesarrollo')->name('admin.roles.update');
Route::post('/admin/roles-sec/{id}','RolesController@secundario')->middleware('ChecarAdmin','ChecarDesarrollo')->name('admin.roles.secundario');
Route::get('/admin/roles/crear','RolesController@create')->middleware('ChecarAdmin','ChecarDesarrollo')->name('admin.roles.create');
Route::post('/admin/roles/crear-rol','RolesController@store')->middleware('ChecarAdmin','ChecarDesarrollo')->name('admin.roles.store');
Route::delete('/admin/roles/usuario/{id}','RolesController@destroy')->middleware('ChecarAdmin','ChecarDesarrollo')->name('admin.roles.destroy');
Route::delete('/admin/roles/eliminar/{id}','RolesController@destroyrol')->middleware('ChecarAdmin','ChecarDesarrollo')->name('admin.roles.rango.destroy');

Route::get('/admin/vacantes','VacantesController@index')->middleware('ChecarAdmin','ChecarDesarrollo')->name('admin.vacantes');
Route::get('/admin/vacantes/crear','VacantesController@create')->middleware('ChecarAdmin','ChecarDesarrollo')->name('admin.vacantes.create');
Route::post('/admin/vacantes/guardar','VacantesController@store')->middleware('ChecarAdmin','ChecarDesarrollo')->name('admin.vacantes.store');
Route::get('/admin/vacantes/{id}','VacantesController@edit')->middleware('ChecarAdmin','ChecarDesarrollo')->name('admin.vacantes.edit');
Route::put('/admin/vacantes/editar/{id}','VacantesController@update')->middleware('ChecarAdmin','ChecarDesarrollo')->name('admin.vacantes.update');
Route::delete('/admin/vacantes/eliminar/{id}','VacantesController@destroy')->middleware('ChecarAdmin','ChecarDesarrollo')->name('admin.vacantes.destroy');

Route::get('/admin/eventos','EventosController@index')->middleware('ChecarAdmin','ChecarDesarrollo','ChecarInformacion')->name('admin.eventos');
Route::get('/admin/eventos/crear','EventosController@create')->middleware('ChecarAdmin','ChecarDesarrollo','ChecarInformacion')->name('admin.eventos.create');
Route::post('/admin/eventos/subir', 'EventosController@portada')->middleware('ChecarAdmin','ChecarDesarrollo','ChecarInformacion')->name('admin.eventos.subir');
Route::post('/admin/eventos/guardar','EventosController@store')->middleware('ChecarAdmin','ChecarDesarrollo','ChecarInformacion')->name('admin.eventos.store');
Route::get('/admin/eventos/editar/{id}','EventosController@edit')->middleware('ChecarAdmin','ChecarDesarrollo','ChecarInformacion')->name('admin.eventos.edit');
Route::put('/admin/eventos/actualizar/{id}','EventosController@update')->middleware('ChecarAdmin','ChecarDesarrollo','ChecarInformacion')->name('admin.eventos.update');
Route::delete('/admin/eventos/eliminar/{id}','EventosController@destroy')->middleware('ChecarAdmin','ChecarDesarrollo','ChecarInformacion')->name('admin.eventos.destroy');

Auth::routes(['verify' => true]);
