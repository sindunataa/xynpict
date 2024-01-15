<?php

use App\Events\ServerCreated;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GaleriesController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [App\Http\Controllers\FrontEndController::class  , 'index'])->name('home');

Auth::routes();

Route::resource('galeries', GaleriesController::class);
Route::resource('albums', AlbumsController::class);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class  , 'index'])->name('dashboard');

Route::prefix('galery/')->name('galery.')->group(function () {
    Route::get('/', [GaleriesController::class, 'index'])->name('index');
    Route::post('/create', [GaleriesController::class, 'create'])->name('create');
    Route::post('/store', [GaleriesController::class, 'store'])->name('store');
    Route::post('/update/{id}', [GaleriesController::class, 'update'])->name('update');
});

Route::prefix('albums/')->name('albums.')->group(function () {
    Route::get('/', [AlbumsController::class, 'index'])->name('index');
    Route::post('update/{id}', [AlbumsController::class, 'update'])->name('update');
    Route::get('albums/delete/{id}', [AlbumsController::class, 'deleteRelated'])->name('delete.related');
});

Route::prefix('articles/')->name('articles.')->group(function () {
    Route::get('/', [ArticlesController::class, 'index'])->name('index');
    Route::post('update/{id}', [ArticlesController::class, 'update'])->name('update');
    Route::get('articles/delete/{id}', [ArticlesController::class, 'deleteRelated'])->name('delete.related');
});
