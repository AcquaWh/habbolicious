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
/* Route::auth(); */
Auth::routes(['register' => false]);
