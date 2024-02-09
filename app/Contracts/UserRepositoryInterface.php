<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function processAndAddUser(array $parameters, string $role);

    public function getTeamMembers(): Builder;
}
