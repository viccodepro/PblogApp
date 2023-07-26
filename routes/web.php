<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [\App\Http\Controllers\PostController::class, 'getIndex'])->name('index');
Route::get('/admin', [\App\Http\Controllers\PostController::class, 'getAdmin'])->name('admin_dashboard');
Route::post('/add', [\App\Http\Controllers\PostController::class, 'postAdd'])->name('add_post');
Route::post('/login', [\App\Http\Controllers\UserController::class, 'postLogin'])->name('login');
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'getLogout'])->name('logout');

