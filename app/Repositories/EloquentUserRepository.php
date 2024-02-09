<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;


class EloquentUserRepository extends EloquentBaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function getTeamMembers(): Builder
    {
        return $this->model
            ->whereHas('role', function ($query) {
                $query->where('name', RolesEnum::TEAM_MEMBER);
            });
    }

}
