<?php

namespace App\Services\ServiceImpl;

use Illuminate\Support\Facades\DB;
use App\Services\UserServiceInterface;

class UserServiceImpl implements UserServiceInterface
{
    public function tes(){
        return "test";
    }
    public function getUserById(int $id)
    {
        // Implementation to get user by ID
    }

    public function createUser(string $name, string $email, string $password)
    {
        // Implementation to create a new user
        if (empty($name) || empty($email) || empty($password)) {
            throw new \InvalidArgumentException("Name, email, and password are required.");
        }

        // Example of creating a user
        $user = DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Check if the user was created successfully
        if (!$user) {
            throw new \Exception("Failed to create user.");
        }
        return ["message" => "User created successfully."];

    }

    public function updateUser(string $name, string $email, string $password)
    {
        // Implementation to update user information
        if (empty($name) || empty($email) || empty($password)) {
            throw new \InvalidArgumentException("Name, email, and password are required.");
        }
        // Example of updating a user
        $user = DB::table('users')->where('email', $email)->update([
            'name' => $name,
            'password' => bcrypt($password),
            'updated_at' => now(),
        ]);
        // Check if the user was updated successfully
        if (!$user) {
            throw new \Exception("Failed to update user.");
        }
        return ["message" => "User updated successfully."];

    }

    public function deleteUser(string $email)
    {
        // Implementation to delete a user
        if (empty($email)) {
            throw new \InvalidArgumentException("Email is required.");
        }
        // Example of deleting a user
        $user = DB::table('users')->where('email', $email)->delete();

        // Check if the user was deleted successfully
        if (!$user) {
            throw new \Exception("Failed to delete user.");
        }

        // Check if the user was deleted successfully
        return ["message" => "User deleted successfully."];
    }
}
