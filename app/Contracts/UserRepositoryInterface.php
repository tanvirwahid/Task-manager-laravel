<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getTeamMembers(): Builder;
}
