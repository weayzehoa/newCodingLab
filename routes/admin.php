<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('admin.login');
});

Route::name('admin.')->group(function() {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login.submit');
    Route::get('otp', [AdminLoginController::class, 'showOtpForm'])->name('otp');
    Route::post('otp', [AdminLoginController::class, 'otp'])->name('otp.submit');
    Route::get('passwordChange', [AdminLoginController::class, 'showPwdChangeForm'])->name('passwordChange');
    Route::post('passwordChange', [AdminLoginController::class, 'passwordChange'])->name('passwordChange.submit');
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('logout');
    Route::get('', [AdminLoginController::class, 'showLoginForm']);
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});
