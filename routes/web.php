<?php

use Illuminate\Support\Facades\Route;
use Modules\Site\Http\Controllers\SiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/logout', function () {

  \Auth::logout();

  session()->flush();

  return redirect('/login');
});

Route::get('/login', function () {
  return view('auth.login');
});

Auth::routes();

// Route::get('/', [SiteController::class, 'index'])->name('site');

// Route::get('/site', function () {
//   Route::get('/', 'SiteController@index');
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/sistema/logout', function () {

//   \Auth::logout();

//   session()->flush();

//   return redirect('/sistema/login');
// });

// Route::get('/sistema/login', function () {
//   return view('auth.login');
// });

// Auth::routes();

// Route::get('/sistema', function () {
//   return redirect('/sistema/home');
// });

Route::get('/site', function () {
  return redirect('/');
});

Route::post('/flmngr', function () {

  \EdSDK\FlmngrServer\FlmngrServer::flmngrRequest(
    array(
      'dirFiles' => base_path() . '/public/ckfinder/userfiles',
    )
  );
});
