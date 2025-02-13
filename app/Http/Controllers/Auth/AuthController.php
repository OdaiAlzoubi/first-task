<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Constants\User\UserStatusConstants;
use App\Http\Requests\Auth\StoreUserRequest;

class AuthController extends Controller
{
    public function __construct(protected UserRepository $userRepository) {}

    public function registerHome()
    {
        return view('auth.register');
    }
    public function register(StoreUserRequest $request)
    {
        $this->userRepository->create($request->validated());
        return redirect()->route('login')->with('success', 'User registered successfully.');
    }

    public function loginHome()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            request()->session()->regenerate();
            if (Auth::user()->status == UserStatusConstants::INACTIVE) {
                return redirect()->back()->with('error', 'The account is inactive, please wait for the administrator to activate your account.');
            }
            return redirect()->route('dashboard')->with('success', 'Login');
        }
        return redirect()->back()->with('error', 'Invalid');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.home');
    }
}
