<?php

namespace App\Http\Controllers\Api\v1\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\RegisterRequest;
use App\Services\AccountService;

class AccountController extends Controller
{
    public function __construct(private readonly AccountService $service)
    {
    }

    public function register(RegisterRequest $request): string
    {
        return $this->service->create($request->getDto());
    }

    public function login()
    {

    }

    public function logout()
    {

    }
}
