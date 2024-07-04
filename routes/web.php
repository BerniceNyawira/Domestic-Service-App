<?php
/*
|Web Routes - Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
**/
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
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



//admincontroller

// routes/web.php



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/domestic-workers/create', [AdminController::class, 'createDomesticWorker'])->name('admin.domestic-workers.create');
    Route::post('/admin/domestic-workers', [AdminController::class, 'storeDomesticWorker'])->name('admin.domestic-workers.store');
    Route::get('/admin/domestic-workers', [AdminController::class, 'viewDomesticWorkers'])->name('admin.domestic-workers.index');
    Route::get('/admin/requests', [AdminController::class, 'viewRequests'])->name('admin.requests.index');
    Route::post('/admin/requests/{id}/approve', [AdminController::class, 'approveRequest'])->name('admin.requests.approve');
    Route::post('/admin/requests/{id}/decline', [AdminController::class, 'declineRequest'])->name('admin.requests.decline');
    Route::get('/admin/relationships', [AdminController::class, 'viewRelationships'])->name('admin.relationships.index');
    Route::post('/admin/relationships/{id}/terminate', [AdminController::class, 'terminateRelationship'])->name('admin.relationships.terminate');
    Route::get('/admin/disputes', [AdminController::class, 'viewDisputes'])->name('admin.disputes.index');
    Route::post('/admin/disputes/{id}/resolve', [AdminController::class, 'resolveDispute'])->name('admin.disputes.resolve');
});



