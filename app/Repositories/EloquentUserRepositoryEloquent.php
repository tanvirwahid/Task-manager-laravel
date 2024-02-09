<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Enums\RolesEnum;
use App\Exceptions\RoleNotFoundException;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EloquentUserRepositoryEloquent extends EloquentBaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function processAndAddUser(array $parameters, string $role): Model
    {
        if (!in_array($role, config('all-roles'))) {
            throw new RoleNotFoundException("Role " . $role . " does not exist");
        }

        $roleToAsign = Role::where('name', $role)->get()->first();

        $parameters['role_id'] = $roleToAsign->id;
        $parameters['password'] = bcrypt($parameters['password']);
        return $this->create($parameters);

    }

    public function getTeamMembers(): Builder
    {
        return $this->model
            ->whereHas('role', function ($query) {
                $query->where('name', RolesEnum::TEAM_MEMBER);
            });
    }

}
