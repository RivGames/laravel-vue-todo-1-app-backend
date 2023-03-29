<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class ForbiddenController extends Controller
{
    public function __invoke()
    {
        throw new HttpResponseException(
          response()->json([
              'message' => 'Forbidden'
          ],403)
        );
    }
}
