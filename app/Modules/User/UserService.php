<?php

namespace App\Modules\User;

use Exception;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function authenticate(array $credentials)
    {
        $user = $this->repository->getUserByEmail($credentials["email"]);
        if (!$user  || !Hash::check($credentials["password"], $user->password))
            throw new Exception("Wrong credentials");
    }
}
