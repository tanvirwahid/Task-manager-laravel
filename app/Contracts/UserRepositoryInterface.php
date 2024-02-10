<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getTeamMembers(): Builder;

    public function getTeamMembersWithoutPagination(): Collection;
}
