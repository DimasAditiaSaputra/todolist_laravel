<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

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
