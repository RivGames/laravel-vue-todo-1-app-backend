<?php

use App\Http\Controllers\Api\v1\Todo\TodoController;
use Illuminate\Support\Facades\Route;

Route::prefix('todo')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::controller(TodoController::class)->group(function () {
            Route::get('/', 'index')->name('todo.index');
            Route::get('{todo}', 'show')->name('todo.show');
            Route::post('/', 'store')->name('todo.store');
            Route::put('/update/{todo}', 'update')->name('todo.update');
            Route::delete('/destroy/{todo}', 'destroy')->name('todo.destroy');
        });
    });
});
