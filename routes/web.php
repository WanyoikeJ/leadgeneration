<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\UpdateaccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AdminloginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Lead\LeadsController;
use App\Http\Controllers\Lead\UpdateleadsController;
use App\Http\Controllers\Users\UpdateuserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// User authentication endpoints
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::inertia('/', 'Home');
    // Route::inertia('/leads', 'Leads');

    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/users/create', [UsersController::class, 'create']);
    Route::get('/user/{id}/edit', [UsersController::class, 'show']);
    Route::post('/users', [UsersController::class, 'store']);
    Route::put('/updateuser/{user}', [UpdateuserController::class, 'update']);

    Route::get('/accounts', [AccountController::class, 'index']);
    Route::post('/accounts', [AccountController::class, 'store']);
    Route::get('/account/create', [AccountController::class, 'create']);
    Route::get('/account/{account}/edit', [AccountController::class, 'show']);
    Route::put('/updateaccount/{account}', [UpdateaccountController::class, 'update']);

    Route::get('/leads', [LeadsController::class, 'index']);
    Route::post('/leads', [LeadsController::class, 'store']);
    Route::get('/lead/create', [LeadsController::class, 'create']);
    Route::get('/lead/{lead}/edit', [LeadsController::class, 'show']);
    Route::put('/lead/{lead}', [UpdateleadsController::class, 'update']);
});


// Admin autheniation endpoints
Route::get('adminlogin', [AdminloginController::class, 'create'])->name('adminlogin');
Route::post('adminlogin', [AdminloginController::class, 'store']);
Route::post('adminlogout', [AdminloginController::class, 'destroy'])->middleware('auth:admin');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admins', [AdminController::class, 'index'])->name('adminsettings');
});