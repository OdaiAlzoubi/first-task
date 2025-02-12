<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Http\Requests\Auth\StoreUserRequest;
use App\Http\Requests\Auth\UpdateUserRequest;

class UserController extends Controller
{
    public function __construct(protected UserRepository $userRepository) {}

    public function store(StoreUserRequest $request)
    {
        $user = $this->userRepository->create($request->validated());
        return response()->json([
            'success' => true,
            'user' => $user,
            'message' => 'User created successfully!',
        ], 201);
    }
    public function update($id, UpdateUserRequest $request)
    {
        $isFind = $this->userRepository->findById($id);
        if ($isFind) {
            $user= $this->userRepository->update($id, $request->validated());
            return response()->json([
                'success' => true,
                'user' => $user,
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
