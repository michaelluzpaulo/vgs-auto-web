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

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/depoimentos'], function () {
  Route::get('/', 'DepoimentoController@index');

  Route::get('/data', 'DepoimentoController@data');
  Route::get('/create', 'DepoimentoController@create');
  Route::get('{id}/edit', 'DepoimentoController@edit');

  Route::post('/', 'DepoimentoController@store');
  Route::put('/{id}', 'DepoimentoController@update');
  Route::delete('/{id}', 'DepoimentoController@destroy');
  Route::post('/{id}/foto', 'DepoimentoController@updateFoto');
  Route::delete('/{id}/foto', 'DepoimentoController@destroyFoto');
});
