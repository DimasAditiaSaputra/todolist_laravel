<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/db-check', function () {
    try {
        DB::connection()->getPdo();
        return "Database Connected!";
    } catch (Exception $e) {
        return "Not Connected: " . $e->getMessage();
    }
});
