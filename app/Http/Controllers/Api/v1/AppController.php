<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function status()
    {
        return response()->json([
            'status' => 'OK',
            'message' => 'Looks pretty good'
        ]);
    }
}
