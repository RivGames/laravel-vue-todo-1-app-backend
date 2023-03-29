<?php

namespace App\Dto\Account;

class CreateDto
{
    public function __construct(private readonly string $name,
                                private readonly string $username,
                                private readonly string $email,
                                private readonly string $password)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
}
