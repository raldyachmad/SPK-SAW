<?php

use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SantriController;
use App\Models\Criteria;
use App\Models\Penilaian;
use App\Models\Santri;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $santris = Santri::with('penilaians.criteria')->get();
    $criterias = Criteria::all();

    $hasil = [];

    foreach ($santris as $santri) {
        $total = 0;

        foreach ($santri->penilaians as $penilaian) {
            $nilai = $penilaian->nilai;
            $bobot = $penilaian->criteria->bobot;
            $atribut = $penilaian->criteria->atribut;

            $normalisasi = $atribut === 'Benefit' ? $nilai : 1 - $nilai;
            $total += $normalisasi * $bobot;
        }

        $hasil[] = [
            'id' => $santri->id,
            'nama' => $santri->nama,
            'nilai_akhir' => round($total, 4),
        ];
    }

    usort($hasil, fn($a, $b) => $b['nilai_akhir'] <=> $a['nilai_akhir']);
    $criteriaCount = Criteria::count();
    $totalPenilaian = Penilaian::select('santri_id')
        ->groupBy('santri_id')
        ->havingRaw('COUNT(*) = ?', [$criteriaCount])
        ->get()
        ->count();
    return view('index', [
        'title' => 'Dashboard',
        'santris' => Santri::latest()->get(),
        'totalSantri' => $santris->count(),
        'totalCriteria' => $criterias->count(),
        'totalPenilaian' => $totalPenilaian,
        'ranking' => collect($hasil),
        'lulusanTerbaik' => $hasil[0] ?? null,
        'criterias' => $criterias,

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
