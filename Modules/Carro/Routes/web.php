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

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/carros'], function () {
  Route::get('/', 'CarroController@index');

  Route::get('/data', 'CarroController@data');
  Route::get('/create', 'CarroController@create');
  Route::get('{id}/edit', 'CarroController@edit');

  Route::post('/', 'CarroController@store');
  Route::put('/{id}', 'CarroController@update');
  Route::delete('/{id}', 'CarroController@destroy');
  Route::post('/{id}/foto', 'CarroController@updateFoto');
  Route::delete('/{id}/foto', 'CarroController@destroyFoto');

  Route::post('/{id}/galeria-foto', 'CarroController@updateGalleryFoto');
  Route::delete('/{id}/galeria-foto/{fotoId}', 'CarroController@destroyGalleryFoto');
  Route::post('/{id}/galeria-foto-all-checked', 'CarroController@destroyGalleryFotoAllChecked');
});
