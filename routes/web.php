<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dash', function () {
    return view('dashboard');
})->middleware('StatusLogin');

Route::get('/db-check', function () {
    try {
        DB::connection()->getPdo();
        return "Database Connected!";
    } catch (Exception $e) {
        return "Not Connected: " . $e->getMessage();
    }
});

Route::get('/test', [UserController::class, 'index']);


// Group route for user service
Route::prefix('user')->group(function () {
    Route::post('/create', [UserController::class, 'createUser']);
    Route::put('/update', [UserController::class, 'updateUser']);
    Route::delete('/delete', [UserController::class, 'deleteUser']);
});

// Group route for auth service
Route::prefix('auth')->group(function () {
    Route::get('/login', function(){
        return view('login');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit'); // Changed to just 'login'
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Route::post('/register', [AuthController::class, 'register'])->name('register');
    // Route::get('/user', [AuthController::class, 'getUser'])->name('user');
});
