<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route; 
// use App\Http\Controllers\admin\LoginController;
// use App\Http\Controllers\admin\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'account'], function(){ 

    // Guest Middelware
    Route::group(['middleware' => 'guest'], function () {
       Route::get('login', [LoginController::class, 'index'])->name('account.login');
       Route::get('register', [LoginController::class, 'register'])->name('account.register');
       Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
       Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
       Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });

    // Auth Middelware
    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
    });
}); 

Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login'); 
Route::get('admin/dashboard',[AdminDashboardController::class, 'index'])->name('admin.dashboard'); 
Route::post('admin/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');