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

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/banners'], function () {
  Route::get('/', 'BannerController@index');

  Route::get('/data', 'BannerController@data');
  Route::get('/create', 'BannerController@create');
  Route::get('{id}/edit', 'BannerController@edit');

  Route::post('/', 'BannerController@store');
  Route::put('/{id}', 'BannerController@update');
  Route::delete('/{id}', 'BannerController@destroy');
  Route::post('/{id}/foto', 'BannerController@updateFoto');
  Route::delete('/{id}/foto', 'BannerController@destroyFoto');
});
