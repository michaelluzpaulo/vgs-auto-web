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

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/cursos-modulos'], function () {
  Route::get('/', 'CursoModuloController@index');

  Route::get('/data', 'CursoModuloController@data');
  Route::get('/create', 'CursoModuloController@create');
  Route::get('{id}/edit', 'CursoModuloController@edit');

  Route::post('/', 'CursoModuloController@store');
  Route::put('/{id}', 'CursoModuloController@update');
  Route::delete('/{id}', 'CursoModuloController@destroy');
});
