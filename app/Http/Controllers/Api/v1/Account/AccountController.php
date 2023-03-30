<?php

namespace App\Http\Controllers\Api\v1\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\LoginRequest;
use App\Http\Requests\Account\RegisterRequest;
use App\Services\AccountService;
use Illuminate\Http\JsonResponse;

class AccountController extends Controller
{
    public function __construct(private readonly AccountService $service)
    {
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        return response()->json(['token' => $this->service->create($request->getDto())]);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        return response()->json(['token' => $this->service->authenticate($request->getDto())]);
    }

    public function logout()
    {

    }
}
