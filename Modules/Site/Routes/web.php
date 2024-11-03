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
  Route::get('artigos', 'SiteController@artigos');
  Route::get('artigo/{ref_amigavel}', 'SiteController@artigo');
  Route::get('artigo', 'SiteController@artigo');
  Route::get('cursos', 'SiteController@cursos');
  Route::get('cursos', 'SiteController@cursosOnline');
  Route::get('terapias', 'SiteController@terapias');
  Route::get('curso/{ref_amigavel}', 'SiteController@curso');
  Route::get('terapia/{ref_amigavel}', 'SiteController@terapia');
  Route::post('contato', 'SiteController@sendContato');

  Route::get('checkout/{id}', 'CheckoutController@checkout');
  Route::post('checkout-cupom', 'CheckoutController@cupom');
  Route::post('checkout-transaction', 'CheckoutController@checkoutTransaction');
  Route::post('curso-cadastro-simplificado', 'CheckoutController@sendCursoCadastroSimplificado');

  Route::post('transaction/notify/{transacao_id}', 'CheckoutController@transactionPagseguroNotify');
  Route::post('transaction/notify/teste/{transacao_id}', 'CheckoutController@testeTransactionPagseguroNotify');
});
