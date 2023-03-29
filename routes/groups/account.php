<?php

use App\Http\Controllers\Api\v1\Account\AccountController;
use Illuminate\Support\Facades\Route;


Route::prefix('account/v1')->group(function(){
    Route::controller(AccountController::class)->group(function(){
        Route::post('register','register')->name('account.register');
    });
});
