<?php

use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\SuperDashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'role:admin'])->name('dashboard');

Route::get('/superadmin/dashboard', [SuperDashboardController::class, 'index'])->middleware(['auth', 'role:superadmin'])->name('superadmin.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('penilaian', PenilaianController::class)->parameters([
        'penilaian' => 'santri',
    ]);
    Route::resource('santri', SantriController::class);
    Route::resource('criteria', CriteriaController::class);
});

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('superadmin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('superadmin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('superadmin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('superadmin/user', UserController::class);
});


Route::prefix('export')->group(function () {
    // Santri
    Route::get('/santri/excel', [ExportController::class, 'exportSantriExcel'])->name('export.santri.excel');
    Route::get('/santri/csv', [ExportController::class, 'exportSantriCsv'])->name('export.santri.csv');
    Route::get('/santri/pdf', [ExportController::class, 'exportSantriPdf'])->name('export.santri.pdf');
    // Criteria
    Route::get('/criteria/excel', [ExportController::class, 'exportCriteriaExcel'])->name('export.criteria.excel');
    Route::get('/criteria/csv', [ExportController::class, 'exportCriteriaCsv'])->name('export.criteria.csv');
    Route::get('/criteria/pdf', [ExportController::class, 'exportCriteriaPdf'])->name('export.criteria.pdf');
    // Penilaian
    Route::get('/penilaian/excel', [ExportController::class, 'exportPenilaianExcel'])->name('export.penilaian.excel');
    Route::get('/penilaian/csv', [ExportController::class, 'exportPenilaianCsv'])->name('export.penilaian.csv');
    Route::get('/penilaian/pdf', [ExportController::class, 'exportPenilaianPdf'])->name('export.penilaian.pdf');
});

require __DIR__ . '/auth.php';
