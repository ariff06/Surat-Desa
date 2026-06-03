<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

// Route untuk warga (guest)
Route::get('/', function () {
    return view('welcome');
});

// Route untuk admin
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Halaman login (diakses kalau belum login)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });

    // Halaman yang butuh login
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

});
