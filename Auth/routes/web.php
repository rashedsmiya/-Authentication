<?php

    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\RegistrationController;        
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('home');
    });


    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/register', [RegistrationController::class, 'index']);
    Route::post('/register', [RegistrationController::class, 'store'])->name('register');

    Route::get('/login', [LoginController::class, 'index']);
