<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserServiceInterface;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        // Inject UserServiceInterface (resolved to UserServiceImpl)
        $this->userService = $userService;
    }

    public function index()
    {
        // Example usage of the service
        $users = $this->userService->tes(); // Assuming getAllUsers() exists in UserServiceImpl
        return response()->json(['users' => $users]);
    }

    // create user
    public function createUser(Request $request)
    {
        // Call the service to create a user
        $user = $this->userService->createUser(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );

        return response()->json([$user]);
    }

    // update user
    public function updateUser(Request $request)
    {
        // Call the service to update a user
        $user = $this->userService->updateUser(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );

        return response()->json([$user]);
    }

    // delete user
    public function deleteUser(Request $request)
    {
        // Call the service to delete a user
        $user = $this->userService->deleteUser(
            $request->input('email')
        );

        return response()->json([$user]);
    }
}

