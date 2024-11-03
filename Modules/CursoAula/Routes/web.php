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

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/cursos-aulas'], function () {
  Route::get('/', 'CursoAulaController@index');

  Route::get('/curso/{id}/modulos', 'CursoAulaController@listCursoModulos');
  Route::get('/data', 'CursoAulaController@data');
  Route::get('/create', 'CursoAulaController@create');
  Route::get('{id}/edit', 'CursoAulaController@edit');
  Route::get('create-duvidas', 'CursoAulaController@createDuvidas');

  Route::post('/', 'CursoAulaController@store');
  Route::put('/{id}', 'CursoAulaController@update');
  Route::delete('/{id}', 'CursoAulaController@destroy');
  Route::post('/{id}/foto', 'CursoAulaController@updateFoto');
  Route::delete('/{id}/foto', 'CursoAulaController@destroyFoto');
});
