<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
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

Route::resource('/admin',AdminController::class);

Route::resource('/category',CategoryController::class);

Route::resource('/product',ProductController::class);
// Route::get('/product',ProductController::class,'filterProduct');


// Route::resource('welcome',WelcomeController::class);

Route::get('/',[App\Http\Controllers\WelcomeController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/filterProduct', [App\Http\Controllers\HomeController::class, 'filterProduct']);
