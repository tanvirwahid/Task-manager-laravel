<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\RoleRepositoryInterFace;
use App\Contracts\UserRepositoryInterface;
use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\UsersTrait;
use App\Http\Requests\UserCreationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use UsersTrait;

    public function __construct(
        private UserRepositoryInterface $userRepository,
        private RoleRepositoryInterFace $roleRepository
    ) {
    }

    public function showLoginPage()
    {
        return view('auth.login');
    }

    public function showRegistrationPage()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/tasks');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    public function register(UserCreationRequest $request)
    {
        $this->userRepository->create(
            $this->getProcessedParameterForUserCreation(
                $request,
                $this->roleRepository,
                RolesEnum::MANAGER
            )
        );

        return redirect('/')
            ->with('success', 'Successfully registered');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
