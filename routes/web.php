<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VillaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [VillaController::class, 'dashboardVilla']);
Route::get('/', [VillaController::class, 'showListVilla']);
Route::get('/detail/{slug}', [VillaController::class, 'showDetailVilla']);

Route::get('/auth', function () {return view('auth.login');})->name('login');
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['admin','auth'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboardAdmin']);
    Route::get('/admin-add', function () {return view('admin.add_villa');});
    Route::post('/admin-add', [AdminController::class, 'addDetailAdmin']);
    Route::get('/admin-edit/{slug}', [AdminController::class, 'editVillaAdminPage']);
    Route::post('/admin-edit', [AdminController::class, 'editDetailAdmin']);
    Route::delete('/admin-delete/{slug}', [AdminController::class, 'deleteVillaAdmin']);
    Route::post('/logout', [AuthController::class, 'logout']);
});