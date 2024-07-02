<?php
/*
|Web Routes - Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
**/

use App\Http\Controllers\EmployerController;
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

//Employer Routes 
Route::middleware(['auth', 'employer'])->group(function(){
    //show dashboard
    Route::get('employer/dashboard', [EmployerController::class, 'showDashboard'])->name('employer.dashboard');
    //updateprofile
    Route::get('/employer/update-profile', [EmployerController::class, 'editProfile'])->name('employer.update.profile');
    Route::post('/employer/update-profile', [EmployerController::class, 'updateProfile'])->name('employer.update.profile');
    //find dw
    Route::get('/employer/find-dw', [EmployerController::class, 'findDw'])->name('employer.find.dw');
    //report disputes
    Route::get('/employer/report-disputes', [EmployerController::class, 'reportDisputes'])->name('employer.report.disputes');
    //view partnerships
    Route::get('/employer/view-partnerships', [EmployerController::class, 'viewPartnerships'])->name('employer.view.partnerships');
    //pending requests
    Route::get('/employer/pending-requests', [EmployerController::class, 'pendingRequests'])->name('employer.pending.requests');
});