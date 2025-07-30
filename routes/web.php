<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VillaController;
use Illuminate\Support\Facades\Route;

// Menampilkan List villa-villa
Route::get('/', [VillaController::class, 'showListVilla']);
// Menampilkan Detail villa
Route::get('/detail/{slug}', [VillaController::class, 'showDetailVilla']);

// Menampilkan Halaman Login Admin
Route::get('/auth', function () {
    return view('auth.login');
})->name('login');
// Login Admin
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['admin', 'auth'])->group(function () {
    // Menampilkan List villa-villa
    Route::get('/admin-dashboard', [AdminController::class, 'dashboardAdmin']);
    // Menampilkan form tambah villa
    Route::get('/admin-add', function () {
        return view('admin.add_villa');
    });
    // Menyimpan villa baru dari form
    Route::post('/admin-add', [AdminController::class, 'addVillaAdmin']);
    // Menampilkan form edit villa yang sudah ada
    Route::get('/admin-edit/{slug}', [AdminController::class, 'editVillaAdminPage']);
    // Memperbarui data villa dari form edit
    Route::put('/admin-edit', [AdminController::class, 'editVillaAdmin']);
    // Menghapus sebuah villa
    Route::delete('/admin-delete/{slug}', [AdminController::class, 'deleteVillaAdmin']);
    // Logout Admin
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Route::middleware(['admin', 'auth'])->prefix('admin')->name('admin.')->group(function () {
//     // Menampilkan List villa-villa
//     Route::get('/dashboard', [AdminController::class, 'dashboardAdmin'])->name('dashboard');
//     // Menampilkan form tambah villa
//     Route::get('/villas/create', function () {return view('admin.add_villa');})->name('villas.create');
//     // Menyimpan villa baru dari form
//     Route::post('/villas', [AdminController::class, 'addVillaAdmin'])->name('villas.store');
//     // Menampilkan form edit villa yang sudah ada
//     Route::get('/villas/{villa}/edit', [AdminController::class, 'edit'])->name('villas.edit');
//     // Memperbarui data villa dari form edit
//     Route::put('/villas/{villa}', [AdminController::class, 'editVillaAdmin'])->name('villas.update');
//     // Menghapus sebuah villa
//     Route::delete('/villas/{slug}', [AdminController::class, 'deleteVillaAdmin'])->name('villas.destroy');
//     // Logout Admin
// });
