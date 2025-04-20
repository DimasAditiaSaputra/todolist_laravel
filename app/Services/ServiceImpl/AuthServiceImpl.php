<?php

namespace App\Services\ServiceImpl;

use App\Services\AuthServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthServiceImpl implements AuthServiceInterface
{
    public function login(string $email, string $password, Request $req)
    {
        if (empty($email) || empty($password)) {
            throw new \InvalidArgumentException('Gmail and password are required.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return [
                'message' => 'Invalid email format',
                'user' => null,
            ];
        }

        // First get the user
        $user = DB::table('users')
            ->where('email', $email)
            ->first();

        // Check if user exists and validate password with Hash::check
        if (!$user || !\Illuminate\Support\Facades\Hash::check($password, $user->password)) {
            return [
                'message' => 'Login failed',
                'user' => null,
            ];
        }

        // Set session
        session(['user_email' => $user->email]);
        session(['status' => 'login']);

        // Set cookies
        cookie()->queue(cookie('user_email', $user->email, 60));

        return [
            'message' => 'Login successful',
            'user' => [
                'email' => $user->email,
                'name' => $user->name
            ],
            "session" => $req->session()->all(),
        ];
    }

    public function logout(Request $request)
    {
        // Get current session ID first
        $sessionId = $request->session()->getId();

        // Logout the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Delete the session from database manually
        DB::table('sessions')->where('id', $sessionId)->delete();

        // Remove cookies
        Cookie::queue(Cookie::forget('user_email'));

        return [
            'message' => 'Logout successful'
        ];
    }
    // public function register(array $data): array
    // {
    //     // Implement registration logic here
    //     return ['user' => 'example_user'];
    // }

    // public function getUser(): ?array
    // {
    //     // Implement get user logic here
    //     return ['user' => 'example_user'];
    // }

    // public function refreshToken(): string
    // {
    //     // Implement refresh token logic here
    //     return 'new_token';
    // }
}
