<?php

namespace App\Http\Controllers;

use App\Contracts\RoleRepositoryInterFace;
use App\Contracts\UserRepositoryInterface;
use App\Enums\RolesEnum;
use App\Http\Controllers\Traits\UsersTrait;
use App\Http\Requests\UserCreationRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    use UsersTrait;

    public function __construct(
        private UserRepositoryInterface $userRepository,
        private RoleRepositoryInterFace $roleRepository
    ) {
    }

    public function index()
    {
        $query = $this->userRepository
            ->getTeamMembers();

        return view('users.index', ['users' => $this->userRepository->paginate($query)]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserCreationRequest $request)
    {
        $this->userRepository->create(
            $this->getProcessedParameterForUserCreation(
                $request,
                $this->roleRepository,
                RolesEnum::TEAM_MEMBER
            )
        );

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $this->userRepository
            ->update($user, $request->all());

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $this->userRepository
            ->destroy($user->id);

        return redirect()->route('users.index');
    }
}
