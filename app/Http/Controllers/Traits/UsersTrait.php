<?php

namespace App\Http\Controllers\Traits;

use App\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

trait UsersTrait
{
    public function createUser(
        Request $request,
        UserRepositoryInterface $userRepository,
        string $role
    )
    {
        $parameters = $request->all();
        unset($parameters['password_confirmation']);

        $userRepository->processAndAddUser(
            $request->all(),
            $role
        );
    }
}
