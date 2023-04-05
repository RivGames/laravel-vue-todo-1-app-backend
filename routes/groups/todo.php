<?php

use App\Http\Controllers\Api\v1\Todo\TodoController;
use Illuminate\Support\Facades\Route;

Route::prefix('todos')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::controller(TodoController::class)->group(function () {
            Route::get('/', 'index')->name('todos.index');
            Route::get('{todo}', 'show')->name('todos.show');
            Route::post('/', 'store')->name('todos.store');
            Route::put('/update/{todo}', 'update')->name('todos.update');
            Route::delete('/destroy/{todo}', 'destroy')->name('todos.destroy');
        });
    });
});
