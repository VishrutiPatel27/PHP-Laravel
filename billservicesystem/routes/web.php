<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AdminController;
 
use App\http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;

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

Route::resource('/user',AdminController::class);
Route::get('user_export',[AdminController::class, 'get_user_data'])->name('user.export');
 
Route::get('/accept/{id}',[AdminController::class,'accept'])->name('user.accept');

Route::get('filter',[AdminController::class,'filter'])->name('user.filter');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
