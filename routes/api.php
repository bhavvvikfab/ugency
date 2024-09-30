<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Public routes
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'saveUser']);

// Protected routes
Route::middleware('auth:api')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });
    Route::post('/changepassword',[UserController::class,'changePassword']);
    Route::post('/addEditProfile',[UserController::class,'addEditProfile']);
    

    // Routes restricted to client admin
    Route::middleware('role:client admin')->group(function () {
        // Client admin routes
    });

    // Routes restricted to client employee
    Route::middleware('role:client employee')->group(function () {
        // Client employee routes
    });

    // Routes restricted to creators
    Route::middleware('role:creators')->group(function () {
        // Creator routes
    });
});