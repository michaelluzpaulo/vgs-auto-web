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

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/categorias'], function () {
  Route::get('/', 'CategoriaController@index');

  Route::get('/data', 'CategoriaController@data');
  Route::get('/create', 'CategoriaController@create');
  Route::get('{id}/edit', 'CategoriaController@edit');

  Route::post('/', 'CategoriaController@store');
  Route::put('/{id}', 'CategoriaController@update');
  Route::delete('/{id}', 'CategoriaController@destroy');
  Route::post('/{id}/foto', 'CategoriaController@updateFoto');
  Route::delete('/{id}/foto', 'CategoriaController@destroyFoto');
});
