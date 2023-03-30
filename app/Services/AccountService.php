<?php

namespace App\Services;


use App\Dto\Account\AuthenticateDto;
use App\Dto\Account\CreateDto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountService
{
    public function create(CreateDto $dto): string
    {
        $user = new User();

        $user->name = $dto->getName();
        $user->username = $dto->getUsername();
        $user->email = $dto->getEmail();
        $user->password = Hash::make($dto->getPassword());
        $user->save();
        return $user->createToken('main')->plainTextToken;
    }

    public function authenticate(AuthenticateDto $dto)
    {
        $credentials = ['email' => $dto->getEmail(), 'password' => $dto->getPassword()];
        if (!Auth::attempt($credentials)) {
            // Need Exception
            return response()->json(['message' => 'Invalid Email or Password']);
        }
        return Auth::loginUsingId(auth()->id())->createToken('main')->plainTextToken;
    }

    public function destroy(Request $request): bool
    {
        return $request->user()->currentAccessToken()->delete();
    }
}
