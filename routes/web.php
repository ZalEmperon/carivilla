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

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Rute untuk menampilkan Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboardAdmin'])->name('dashboard');

    // --- GRUP UNTUK FITUR CRUD VILLA ---

    // 1. CREATE: Menampilkan form tambah villa
    Route::get('/villas/create', function() {
        return view('admin.add_villa');
    })->name('villas.create');

    // 2. STORE: Menyimpan villa baru dari form
    Route::post('/villas', [AdminController::class, 'addVillaAdmin'])->name('villas.store');

    // 3. EDIT: Menampilkan form edit villa yang sudah ada
    Route::get('/villas/{villa}/edit', [AdminController::class, 'edit'])->name('villas.edit');

    // 4. UPDATE: Memperbarui data villa dari form edit
    Route::put('/villas/{villa}', [AdminController::class, 'editVillaAdmin'])->name('villas.update');

    // 5. DELETE: Menghapus sebuah villa
    Route::delete('/villas/{slug}', [AdminController::class, 'deleteVillaAdmin'])->name('villas.destroy');
});