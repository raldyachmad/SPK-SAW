<?php

use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SantriController;
use App\Models\Criteria;
use App\Models\Santri;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index', [
        'title' => 'Dashboard',
        'totalSantri' => Santri::count(),
        'totalCriteria' => Criteria::count(),
        'santris' => Santri::latest()->get(),
        'criterias' => Criteria::latest()->get(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('penilaian', PenilaianController::class)->parameters([
        'penilaian' => 'santri',
    ]);
    Route::resource('santri', SantriController::class);
    Route::resource('criteria', CriteriaController::class);
});

require __DIR__ . '/auth.php';
