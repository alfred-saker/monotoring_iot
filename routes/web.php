<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ChartDataController;
use App\Http\Controllers\AuthController;

Route::get('/', [ModuleController::class, 'index'])->name('home');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register/', [AuthController::class, 'register'])->name('register');
Route::get('login/', [AuthController::class, 'login'])->name('login');
Route::post('login/', [AuthController::class, 'login_user'])->name('login.save');
Route::post('register/', [AuthController::class, 'save_user'])->name('register.save');

Route::get('modules/create', [ModuleController::class, 'create'])->name('module.create');
Route::post('modules', [ModuleController::class, 'store'])->name('module.store');

Route::get('history/create', [ModuleController::class, 'create_detail'])->name('history.create_detail');
Route::post('/history', [ModuleController::class, 'store_history'])->name('history.store');

Route::get('/chart_data',[ChartDataController::class, 'index'] );


