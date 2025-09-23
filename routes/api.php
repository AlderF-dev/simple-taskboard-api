<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('/tasks')->name('tasks.')->group(function () {
    Route::get('/', [TaskController::class, 'get'])->name('get');
    Route::post('/', [TaskController::class, 'store'])->name('store');
    Route::put('/{task}', [TaskController::class, 'update'])->name('update');
    Route::delete('/{task}', [TaskController::class, 'delete'])->name('delete');
});
