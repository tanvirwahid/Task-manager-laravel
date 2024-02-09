<?php

namespace App\Contracts;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function addUser(array $parameters, string $role);
}
