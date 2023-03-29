<?php

namespace App\Services;


use App\Dto\Account\CreateDto;
use App\Models\User;
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
}
