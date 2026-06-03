<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\PermohonanController;

// Route untuk warga (guest)
Route::get('/', [PermohonanController::class, 'index'])->name('permohonan.index');

Route::post('/permohonan/tidak-mampu', [PermohonanController::class, 'storeTidakMampu'])->name('permohonan.store.tidak_mampu');
Route::post('/permohonan/kematian', [PermohonanController::class, 'storeKematian'])->name('permohonan.store.kematian');
Route::get('/permohonan/status/{tipe}/{token}', [PermohonanController::class, 'status'])->name('permohonan.status');

// Route untuk admin
Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

});