<?php

use App\Http\Controllers\ArsipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriArsipController;

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

   Route::get('/change-password', [UserController::class, 'showChangePasswordForm'])->name('user.show-change-password');
   Route::post('/change-password', [UserController::class, 'changePassword'])->name('user.change-password');
});
