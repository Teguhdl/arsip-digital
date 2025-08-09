<?php

use App\Http\Controllers\ArsipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriArsipController;
use App\Http\Controllers\ArsipDownloadHistoryController;
use App\Http\Controllers\ScanController;

Route::get('/', function () {
    return redirect()->route('login');
});


// Rute untuk login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('checkLogin')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('kategori-arsip', KategoriArsipController::class);
    Route::resource('arsip', ArsipController::class);
    Route::get('/arsip/download/{id}', [ArsipController::class, 'download'])->name('arsip.download');
    Route::get('/arsip-history', [ArsipDownloadHistoryController::class, 'index'])->name('arsip.history');
    Route::get('/scan-qr-code', [ScanController::class, 'index'])->name('scan.index');
    Route::post('/scan-process', [ScanController::class, 'process'])->name('scan.process');

    Route::get('/change-password', [UserController::class, 'showChangePasswordForm'])->name('user.show-change-password');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('user.change-password');
});
