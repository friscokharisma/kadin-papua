<?php

use Illuminate\Support\Facades\Route;
use App\Http\COntrollers\PagesController;
use App\Http\COntrollers\PostsController;

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

Route::get('/', [PagesController::class, 'index']);

Route::resource('/article', PostsController::class);
Route::get('/dashboard', [PostsController::class, 'dashboardindex']);

// Route::resource('/dashboard', PostsController::class);
// Route::get('/article', [PostsController::class, 'articleindex']);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', function() {
//     return view ('dashboard.index');
// });

// Route::get('/create', function() {
//     return view ('dashboard.create');
// });