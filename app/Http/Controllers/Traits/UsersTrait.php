<?php

namespace App\Http\Controllers\Traits;

use App\Contracts\RoleRepositoryInterFace;
use Illuminate\Http\Request;

trait UsersTrait
{
    public function getProcessedParameterForUserCreation(
        Request $request,
        RoleRepositoryInterFace $roleRepository,
        string $role
    ): array {
        $roleId = $roleRepository
            ->FindRoleIdByName($role);

        $parameters = $request->all();
        $parameters['role_id'] = $roleId;
        $parameters['password'] = bcrypt($parameters['password']);
        unset($parameters['password_confirmation']);

        return $parameters;
    }
}
