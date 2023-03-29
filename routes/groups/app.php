<?php

use App\Http\Controllers\Api\v1\AppController;
use Illuminate\Support\Facades\Route;

Route::controller(AppController::class)->group(function(){
    Route::get('status','status')->name('app.status');
});
