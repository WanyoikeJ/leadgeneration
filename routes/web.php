<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\UpdateaccountController;
use App\Http\Controllers\Admin\AdminagentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UpdateagentController;
use App\Http\Controllers\Agent\AgentassignmentController;
use App\Http\Controllers\Agent\AgentatasksController;
use App\Http\Controllers\Agent\UpdateagenttaskController;
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

Route::get('tasks', [AgentassignmentController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::inertia('/', 'Home');
    // Route::inertia('/leads', 'Leads');

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
    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/users/create', [UsersController::class, 'create']);
    Route::get('/user/{id}/edit', [UsersController::class, 'show']);
    Route::post('/users', [UsersController::class, 'store']);
    Route::put('/updateuser/{user}', [UpdateuserController::class, 'update']);

    Route::get('/agents', [AdminagentController::class, 'index']);
    Route::get('/agents/create', [AdminagentController::class, 'create']);
    Route::get('/agent/{id}/edit', [AdminagentController::class, 'show']);
    Route::post('/agents', [AdminagentController::class, 'store']);
    Route::put('/updateagent/{agent}', [UpdateagentController::class, 'update']);

    // agenttasks
    Route::get('agentstasks', [AgentatasksController::class, 'index']);
    Route::get('agentstasks/create', [AgentatasksController::class, 'create']);
    Route::post('/agentstasks', [AgentatasksController::class, 'store']);
    Route::get('/agentstask/{agentassignment}/edit', [AgentatasksController::class, 'show']);
    Route::put('/agentstask/{agentassignment}', [UpdateagenttaskController::class, 'update']);
    
    Route::get('/admins', [AdminController::class, 'index'])->name('adminsettings');
});