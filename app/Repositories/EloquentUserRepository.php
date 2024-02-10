<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepositoryInterface
{
    public function __construct(private User $user)
    {
        parent::__construct($user);
    }

    public function getTeamMembers(): Builder
    {
        return $this->user->query()
            ->whereHas('role', function ($query) {
                $query->where('name', RolesEnum::TEAM_MEMBER);
            });
    }

    public function getTeamMembersWithoutPagination(): Collection
    {
        return $this->getTeamMembers()->get();
    }

}
