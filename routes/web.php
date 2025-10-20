<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DocenteController as AdminDocenteController;
use App\Http\Controllers\Admin\AsignaturaController;
use App\Http\Controllers\Docente\DocenteController as DocenteDashboardController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return redirect('/login');
});

// Panel de ADMIN
Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('docentes', AdminDocenteController::class);
    Route::resource('asignaturas', AsignaturaController::class);
    

});

// Panel de DOCENTE
Route::middleware(['auth', 'can:isDocente'])->group(function () {
    Route::get('/docente/dashboard', [DocenteDashboardController::class, 'dashboard'])->name('docente.dashboard');
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de autenticación Breeze/Fortify
require __DIR__.'/auth.php';
