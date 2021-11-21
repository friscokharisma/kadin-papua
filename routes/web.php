<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\COntrollers\PagesController;
use App\Http\COntrollers\PostsController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/article', [PostsController::class, 'articleindex'])->name('main-article');
Route::get('/article/{id}', [PostsController::class, 'show'])->name('article.show');

Route::prefix('d')->group(function () {
    Auth::routes();

    Route::middleware(['auth'])->group(function () {
        Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

        Route::get('', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('articles', ArticleController::class);
    });
});




// Route::get('/', [PostsController::class, 'dashboardindex']);
// Route::resource('/article', PostsController::class);
// Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
// Route::resource('/dashboard', PostsController::class);

// Auth::routes();

// Route::get('/dashboard', function() {
//     return view ('dashboard.index');
// });

// Route::get('/create', function() {
//     return view ('dashboard.create');
// });
