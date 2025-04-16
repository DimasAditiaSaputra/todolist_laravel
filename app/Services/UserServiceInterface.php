<?php

namespace App\Services;

interface UserServiceInterface
{
    public function tes();
    public function getUserById(int $id);
    public function createUser(string $name, string $email, string $password);
    public function updateUser(string $name, string $email, string $password);
    public function deleteUser(string $email);
}
