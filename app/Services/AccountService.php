<?php

namespace App\Services;


use App\Dto\Account\AuthenticateDto;
use App\Dto\Account\CreateDto;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountService
{
    public function create(CreateDto $dto): JsonResponse
    {
        $user = new User();

        $user->name = $dto->getName();
        $user->username = $dto->getUsername();
        $user->email = $dto->getEmail();
        $user->password = Hash::make($dto->getPassword());
        $user->save();

        return response()->json(['token' => $user->createToken('main')->plainTextToken]);
    }

    public function authenticate(AuthenticateDto $dto): JsonResponse
    {
        $credentials = ['email' => $dto->getEmail(), 'password' => $dto->getPassword()];
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid Email or Password']);
        }
        return response()->json(['token' => Auth::loginUsingId(auth()->id())->createToken('main')->plainTextToken]);
    }
}
