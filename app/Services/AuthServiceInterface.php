<?php

namespace App\Services;
use Illuminate\Http\Request;

interface AuthServiceInterface
{
    public function login(string $email, string $password, Request $req);
    public function logout(Request $request);
}
