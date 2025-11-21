<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

// Admin login page
Route::get('/', [BackendController::class, 'showAdminLogin'])->name('admin.login.page');
Route::get('/admin', [BackendController::class, 'showDashboard'])->name('admin.dashboard');
Route::resource('member',MemberController::class);