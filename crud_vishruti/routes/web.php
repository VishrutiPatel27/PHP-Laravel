<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('posts', PostController::class);

/*Route::get('blogs', '\App\Http\Controllers\PostController@index')->name('index');
Route::get('blogs/create', '\App\Http\Controllers\PostController@create')->name('create');
Route::get('blogs/{blog}/edit', '\App\Http\Controllers\PostController@edit')->name('edit');

/*Route::get('blogs', '[BlogController::class, 'index']');

Route::get('blogs/create', '[BlogController::class, 'create']');

Route::post('blogs', '[BlogController::class, 'store']');

Route::get('blogs/{blog}/edit', '[BlogController::class, 'edit']');

Route::put('blogs/{blog}', '[BlogController::class, 'update']');

Route::get('blogs/{blog}', '[BlogController::class, 'show']');

Route::delete('blogs/{blog}', '[BlogController::class, 'destroy']');*/
