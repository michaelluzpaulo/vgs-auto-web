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

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/newsletters'], function () {
  Route::get('/', 'NewsletterController@index');

  Route::get('/data', 'NewsletterController@data');
  Route::get('/create', 'NewsletterController@create');
  Route::get('{id}/edit', 'NewsletterController@edit');

  Route::post('/', 'NewsletterController@store');
  Route::put('/{id}', 'NewsletterController@update');
  Route::delete('/{id}', 'NewsletterController@destroy');
});
