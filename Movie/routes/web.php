<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AdminController;
use App\http\Controllers\MovieController;
use App\http\Controllers\ShowController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/admin',AdminController::class);
Route::get('admin_export',[AdminController::class, 'get_admin_data'])->name('admin.export');
Route::resource('/movie',MovieController::class);
Route::get('movie_export',[MovieController::class, 'get_movie_data'])->name('movie.export');
Route::resource('/show',ShowController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
