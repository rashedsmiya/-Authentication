<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Https\Controller\AuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/getUser',[AuthController::class, 'getUser']);
    Route::post('/logout',[AuthController::class, 'logout']);
});