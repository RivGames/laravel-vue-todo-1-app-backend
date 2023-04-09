<?php

namespace App\Http\Controllers\Api\v1\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\LoginRequest;
use App\Http\Requests\Account\RegisterRequest;
use App\Services\AccountService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * @param AccountService $service
     */
    public function __construct(private readonly AccountService $service)
    {
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        return response()->json(['token' => $this->service->create($request->getDto())]);
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $logic = $this->service->authenticate($request->getDto());
        if(!$logic){
            return response()->json(['message' => 'Invalid email or password'],401);
        }
        return response()->json(['token' => $logic]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $this->service->destroy($request);
        return response()->json(['message' => 'Successfully logged out']);
    }
}
