<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;

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

Route::controller(AppController::class)->group(function() {
    Route::middleware('auth')->group(function () {
        Route::get('/', 'home');
    });
});

Route::controller(UserController::class)->group(function() {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');

    Route::middleware('auth')->group(function () {
        Route::get('/logout', 'logout');
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create')->name('users.create');
        Route::get('/users/{user}', 'show')->name('users.show');
        Route::post('/users', 'store')->name('users.store');
        Route::get('/users/{user}/edit', 'edit')->name('users.edit');
        Route::put('/users/{user}', 'update')->name('users.update');
        Route::delete('/users/{user}', 'destroy')->name('users.destroy');
    });
});

Route::controller(FileController::class)->group(function() {
    Route::middleware('auth')->group(function() {
        Route::get('/files', 'index')->name('file.index');
        Route::get('/files/create', 'create')->name('files.create');
        Route::post('/files', 'store')->name('files.store');
        Route::get('/files/{file}/download', 'download')->name('file.download');
    });
});

