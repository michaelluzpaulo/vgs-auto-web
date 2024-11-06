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

// Route::group(['middleware' => ['web'], 'prefix' => 'site'], function () {

// });


Route::group(['middleware' => ['web'], 'prefix' => '/'], function () {

  Route::get('/', 'SiteController@index');
  Route::get('i/{ref_amigavel}', 'SiteController@institucional');
  Route::get('contato', 'SiteController@contato');
  Route::get('carros', 'SiteController@carros');
  Route::get('carro/{ref_amigavel}', 'SiteController@carro');
  Route::get('localizacao', 'SiteController@nossoEndereco');
  Route::get('financiamento', 'SiteController@financiamento');
  Route::post('contato', 'SiteController@sendContato');
});
