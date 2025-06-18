<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Criteria;
use App\Models\Penilaian;
use App\Models\Santri;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
