<?php

namespace App\Repositories;

use App\Contracts\BaseRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Exceptions\RoleNotFoundException;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function addUser(array $parameters, string $role)
    {

        if(!in_array($role, config('all-roles')))
        {
            throw new RoleNotFoundException("Role ".$role. " does not exist");
        }

        $roleToAsign = Role::where('name', $role)->get();

        DB::transaction(function () use ($roleToAsign, $role, $parameters) {
            if($roleToAsign->count() == 0)
            {
                $roleToAsign = Role::create([
                    'name' => $role
                ]);
            } else
            {
                $roleToAsign = $roleToAsign->first();
            }

            $parameters['role_id'] = $roleToAsign->id;
            $parameters['password'] = bcrypt($parameters['password']);
            $this->create($parameters);
        });

    }

}
