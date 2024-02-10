<?php

namespace App\Contracts;

interface RoleRepositoryInterFace
{
    public function FindRoleIdByName(string $name): int;

    public function getLoggedinUserRole(): string;
}
