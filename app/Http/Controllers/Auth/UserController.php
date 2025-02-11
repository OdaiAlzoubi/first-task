<?php

namespace App\Http\Controllers\Auth;

use App\Constants\User\UserStatusConstants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\StoreUserRequest;
use App\Http\Requests\Auth\UpdateUserRequest;

class UserController extends Controller
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
        return view('auth.login');  // Login Form View
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            request()->session()->regenerate();
            if (Auth::user()->status == UserStatusConstants::INACTIVE) {
                return redirect()->back()->with('error', 'The account is inactive, please wait for the administrator to activate your account.');
            }
            return redirect()->route('dashboard')->with('success', 'Login');
        }
        return redirect()->back()->with('error', 'Invalid');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.home')->with('success', 'Logout');
    }

    public function update($id, UpdateUserRequest $request)
    {
        $isFind = $this->userRepository->findById($id);
        if ($isFind) {
            $this->userRepository->update($id, $request->validated());
            return response()->json([
                'success' => true,
                'message' => 'User updated successfully!',
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'User not found!',
        ], 404);
    }
    public function destroy($id)
    {
        $isFind = $this->userRepository->findById($id);
        // dd($isFind);
        if ($isFind) {
            $this->userRepository->delete($id);
            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully!',
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'User not found!',
        ], 404);
    }
}
