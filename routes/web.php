<?php

use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\UserLocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UptController;
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


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::get('login', [LoginController::class, 'index']);

    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('dashboard', DashboardController::class)->only('index');

    Route::prefix('dashboard')->name('dashboard.')->group(function ()
    {
        Route::resource('upt', UptController::class);

        Route::resource('petugas', UserController::class);

        Route::resource('lokasi-petugas', UserLocationController::class);

        Route::resource('laporan-aktivitas', UserActivityController::class);

        Route::resource('pencarian', SearchController::class);
    });
});


// Route::prefix('laravel-filemanager')->middleware(['web', 'auth'])->group(function ()
// {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });
