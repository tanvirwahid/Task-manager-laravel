<?php

namespace App\Repositories;

use App\Contracts\RoleRepositoryInterFace;
use App\Exceptions\RoleNotFoundException;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterFace
{
    public function __construct(private Role $role)
    {
    }

    public function FindRoleIdByName(string $name): int
    {
        if (!in_array($name, config('all-roles'))) {
            throw new RoleNotFoundException("Role " . $name . " does not exist");
        }

        return $this->role->where('name', $name)
            ->get()
            ->first()
            ->id;
    }

}
