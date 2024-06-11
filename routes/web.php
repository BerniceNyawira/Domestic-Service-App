<?php
/*
|Web Routes - Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
**/

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

//route for the register page
Route::get('register/newuser', [RegisterController::class, 'create'])->name('register.newuser');
Route::post('register', [RegisterController::class, 'store'])->name('register');

//route for login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    // Other admin routes
});

Route::middleware(['role:employer'])->group(function () {
    Route::get('/employer/dashboard', [EmployerController::class, 'index']);
    // Other employer routes
});

Route::middleware(['role:domestic_worker'])->group(function () {
    Route::get('/domestic_worker/dashboard', [DomesticWorkerController::class, 'index']);
    // Other domestic worker routes
});