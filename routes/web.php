<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PagesController;

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
    return view('index');
});

Auth::routes();

//for dashbord
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//for users
Route::resource('users',UsersController::class);
//for posts
Route::resource('posts', PostsController::class);
//for posts
Route::resource('pages', PagesController::class);
