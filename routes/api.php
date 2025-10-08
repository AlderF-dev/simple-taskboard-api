<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;


Route::prefix('/auth')->name('auth.')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/me', [AuthController::class, 'getMe'])->name('me')->middleware(Authenticate::using('sanctum'));
    Route::post('/logout', [AuthController::class, 'logout'])->middleware(Authenticate::using('sanctum'));;
});

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('/tasks')->name('tasks.')->group(function () {
        Route::get('/', [TaskController::class, 'get'])->name('get');
        Route::post('/', [TaskController::class, 'store'])->name('store');
        Route::put('/{task}', [TaskController::class, 'update'])->name('update');
        Route::delete('/{task}', [TaskController::class, 'delete'])->name('delete');
    });

    Route::prefix('/tags')->name('tags.')->group(function () {
        Route::get('/', [TagController::class, 'get'])->name('get');
    });
});
