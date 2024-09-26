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