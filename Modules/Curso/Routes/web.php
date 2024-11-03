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

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/cursos'], function () {
  Route::get('/', 'CursoController@index');

  Route::get('/data', 'CursoController@data');
  Route::get('/create', 'CursoController@create');
  Route::get('{id}/edit', 'CursoController@edit');

  Route::post('/', 'CursoController@store');
  Route::put('/{id}', 'CursoController@update');
  Route::delete('/{id}', 'CursoController@destroy');
  Route::post('/{id}/foto', 'CursoController@updateFoto');
  Route::delete('/{id}/foto', 'CursoController@destroyFoto');

  Route::post('/{id}/galeria-foto', 'CursoController@updateGalleryFoto');
  Route::delete('/{id}/galeria-foto/{fotoId}', 'CursoController@destroyGalleryFoto');
});
