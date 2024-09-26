<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/dashboard', function () {
//     return view('index');
//     // return view('welcome');
// });

Route::get('/',[AuthController::class,'loginView'])->name('loginView');
Route::get('/register',[AuthController::class,'registerView'])->name('registerView');
Route::get('/dashboard',[DashboardController::class,'dashboardView'])->name('dashboardView');

Route::get('/userprofile',[UserController::class,'profileView'])->name('profileView');
Route::get('/settings',[UserController::class,'settingView'])->name('settingView');




// Public routes
Route::post('login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:api')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });

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