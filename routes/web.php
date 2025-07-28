<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VillaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [VillaController::class, 'dashboardVilla']);
Route::get('/', [VillaController::class, 'showListVilla']);
Route::get('/detail/{slug}', [VillaController::class, 'showDetailVilla']);

Route::get('/auth', function () {return view('auth.login');});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'logout']);

Route::middleware(['admin','auth'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboardAdmin']);
    Route::get('/admin-add', function () {return view('admin.add_villa');});
    Route::post('/admin-add', [AdminController::class, 'addDetailAdmin']);
    Route::get('/admin-edit', function () {return view('admin.edit_villa');});
    Route::post('/admin-edit', [AdminController::class, 'editDetailAdmin']);
    Route::delete('/admin-delete/{slug}', [VillaController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);
});