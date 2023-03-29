<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/groups/app.php';
require __DIR__ . '/groups/account.php';

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
