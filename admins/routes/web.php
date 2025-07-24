<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'index'])->name('account.login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('account.authenticate');