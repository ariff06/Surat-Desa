<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\PermohonanController;

// Route untuk warga (guest)
Route::get('/', [PermohonanController::class, 'dashboard'])->name('permohonan.dashboard');

Route::prefix('surat')->name('surat.')->group(function () {
    Route::get('/tidak-mampu', [PermohonanController::class, 'tidakMampu'])->name('tidak-mampu');
    Route::post('/tidak-mampu', [PermohonanController::class, 'storeTidakMampu'])->name('store.tidak-mampu');
    Route::get('/kematian', [PermohonanController::class, 'kematian'])->name('kematian');
    Route::post('/kematian', [PermohonanController::class, 'storeKematian'])->name('store.kematian');
    Route::get('/status/{tipe}/{token}', [PermohonanController::class, 'status'])->name('status');
    Route::get('/cek-status', [PermohonanController::class, 'cekStatus'])->name('cek-status');
    Route::get('/download/{tipe}/{token}', [PermohonanController::class, 'download'])->name('download');

    });

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