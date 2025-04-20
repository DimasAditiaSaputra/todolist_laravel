<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthServiceInterface;

class AuthController extends Controller
{
    private AuthServiceInterface $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $result = $this->authService->login($email, $password, $request);

        if ($result['user'] !== null) {
            // Login berhasil, redirect ke dashboard
            return redirect('/dash');
        } else {
            // Login gagal, kembali ke halaman login dengan pesan error
            return back()->withErrors(['message' => $result['message']]);
        }
    }

    public function logout(Request $request)
    {
        // Panggil service logout
        $result = $this->authService->logout($request);

        // Pastikan untuk menghapus session status juga
        session()->forget('status');

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Berhasil logout');
    }

    // public function register(Request $request)
    // {
    //     return $this->authService->register($request->all());
    // }

    // public function getUser()
    // {
    //     return $this->authService->getUser();
    // }
}
