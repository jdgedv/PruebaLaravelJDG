<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotifyController;


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

Route::view('/', 'home')->name('home');
Route::get('login', [SpotifyController::class, 'login'])->name('login');
Route::get('profile', [SpotifyController::class, 'getUser'])->name('profile');
Route::view('/albums', 'albums')->name('albums');

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'HomeController@index');
*/