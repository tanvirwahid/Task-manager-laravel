<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\UserRepositoryInterface;
use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct(private UserRepositoryInterface $userRepository)
    {
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
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/tasks');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'employee_id' => 'required|unique:users,employee_id',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|confirmed|min:6'
        ]);

        $parameters = $request->all();
        unset($parameters['password_confirmation']);

        $this->userRepository->addUser(
            $request->all(),
            RolesEnum::MANAGER
        );

        return redirect('/')
            ->with('success', 'Successfully registered');
    }
}
