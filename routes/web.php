<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Request;
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

Route::get('/settings',[UserController::class,'settingView'])->name('settingView');

// ===== Public routes =====

// ===== LOGIN =====
// Route::get('/',[AuthController::class,'loginView'])->name('loginView');
Route::middleware('guest')->group(function(){
    Route::get('/',[AuthController::class,'loginView'])->name('loginView');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    
    // ===== REGISTER =====
    Route::get('/register',[AuthController::class,'registerView'])->name('registerView');
    Route::post('/saveuser',[AuthController::class,'saveUser'])->name('saveuser');
});


// ===== Protected routes =====
Route::middleware('auth')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });

    Route::get('/dashboard',[DashboardController::class,'dashboardView'])->name('dashboardView');
    
    Route::get('/userprofile',[UserController::class,'profileView'])->name('profileView');
    Route::post('/changepassword',[UserController::class,'changePassword'])->name('changepassword');
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

    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

});