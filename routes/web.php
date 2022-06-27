<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Auth
require __DIR__.'/auth.php';

// Users
Route::prefix('admin/user')->group(function () {
    Route::get('/', [UserController::class, 'list'])->name('user.list');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');

    Route::get('/add', [UserController::class, 'add'])->name('user.add');
    Route::post('/add', [UserController::class, 'store'])->name('user.store');

    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
});

// Routes
Route::prefix('admin/route')->group(function () {
    Route::get('/', [RouteController::class, 'list'])->name('route.list');
    Route::get('/show/{id}', [RouteController::class, 'show'])->name('route.show');

    Route::get('/add', [RouteController::class, 'add'])->name('route.add');
    Route::post('/add', [RouteController::class, 'store'])->name('route.store');

    Route::get('/edit/{id}', [RouteController::class, 'edit'])->name('route.edit');
    Route::patch('/edit/{id}', [RouteController::class, 'update'])->name('route.update');
    Route::delete('/delete/{id}', [RouteController::class, 'delete'])->name('route.delete');
});

// Drivers
Route::prefix('admin/driver')->group(function () {
    Route::get('/', [DriverController::class, 'list'])->name('driver.list');
    Route::get('/show/{id}', [DriverController::class, 'show'])->name('driver.show');

    Route::get('/add', [DriverController::class, 'add'])->name('driver.add');
    Route::post('/add', [DriverController::class, 'store'])->name('driver.store');

    Route::get('/edit/{id}', [DriverController::class, 'edit'])->name('driver.edit');
    Route::patch('/edit/{id}', [DriverController::class, 'update'])->name('driver.update');
    Route::delete('/delete/{id}', [DriverController::class, 'delete'])->name('driver.delete');
});

// Helpers
Route::prefix('admin/helper')->group(function () {
    Route::get('/', [HelperController::class, 'list'])->name('helper.list');
    Route::get('/show/{id}', [HelperController::class, 'show'])->name('helper.show');

    Route::get('/add', [HelperController::class, 'add'])->name('helper.add');
    Route::post('/add', [HelperController::class, 'store'])->name('helper.store');

    Route::get('/edit/{id}', [HelperController::class, 'edit'])->name('helper.edit');
    Route::patch('/edit/{id}', [HelperController::class, 'update'])->name('helper.update');
    Route::delete('/delete/{id}', [HelperController::class, 'delete'])->name('helper.delete');
});

// Transports
Route::prefix('admin/transport')->group(function () {
    Route::get('/', [TransportController::class, 'list'])->name('transport.list');
    Route::get('/show/{id}', [TransportController::class, 'show'])->name('transport.show');

    Route::get('/add', [TransportController::class, 'add'])->name('transport.add');
    Route::post('/add', [TransportController::class, 'store'])->name('transport.store');

    Route::get('/edit/{id}', [TransportController::class, 'edit'])->name('transport.edit');
    Route::patch('/edit/{id}', [TransportController::class, 'update'])->name('transport.update');
    Route::delete('/delete/{id}', [TransportController::class, 'delete'])->name('transport.delete');
});

// Logs
Route::prefix('history')->group(function () {
    Route::get('/', [HistoryController::class, 'list'])->name('log.list');
    Route::get('/show/{id}', [HistoryController::class, 'show'])->name('log.show');

    Route::get('/add', [HistoryController::class, 'add'])->name('log.add');
    Route::post('/add', [HistoryController::class, 'store'])->name('log.store');

    Route::get('/edit/{id}', [HistoryController::class, 'edit'])->name('log.edit');
    Route::patch('/edit/{id}', [HistoryController::class, 'update'])->name('log.update');
    Route::delete('/delete/{id}', [HistoryController::class, 'delete'])->name('log.delete');
});
