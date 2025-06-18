<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Penilaian;
use App\Models\Santri;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Daftar Penilaian";
        // Ambil semua santri beserta penilaiannya dan kriteria
        $santris = Santri::with('penilaians.criteria')->get();

        $hasil = [];

        foreach ($santris as $santri) {
            $total = 0;

            foreach ($santri->penilaians as $penilaian) {
                $nilai = $penilaian->nilai;
                $bobot = $penilaian->criteria->bobot;
                $atribut = $penilaian->criteria->atribut;

                // Normalisasi nilai
                if ($atribut === 'Benefit') {
                    $normalisasi = $nilai; // nilai sudah dalam 0-1
                } else {
                    $normalisasi = 1 - $nilai; // semakin kecil semakin baik
                }

                $total += $normalisasi * $bobot;
            }

            $hasil[] = [
                'id' => $santri->id,
                'nama' => $santri->nama,
                'nilai_akhir' => round($total, 4)
            ];
        }

        // Urutkan dari yang tertinggi
        usort($hasil, fn($a, $b) => $b['nilai_akhir'] <=> $a['nilai_akhir']);

        return view('penilaian.index', compact('hasil', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Penilaian';
        $santris = Santri::all();
        $criterias = Criteria::all();
        $penilaians = Penilaian::all(); // Kirim semua penilaian

        return view('penilaian.create', compact('santris', 'criterias', 'penilaians', 'title'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'nilai' => 'required|array',
            'nilai.*' => 'required|numeric|min:0|max:1',
        ]);

        foreach ($request->nilai as $criteria_id => $value) {
            Penilaian::updateOrCreate(
                [
                    'santri_id' => $request->santri_id,
                    'criteria_id' => $criteria_id
                ],
                [
                    'nilai' => $value
                ]
            );
        }
        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil ditambahkan!');
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
    public function edit(Santri $santri)
    {
        $title = "Edit Penilaian";
        $criterias = Criteria::all();
        $penilaians = $santri->penilaians()->get()->keyBy('criteria_id');

        return view('penilaian.edit', compact('santri', 'criterias', 'penilaians', 'title'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Santri $santri)
    {
        $request->validate([
            'nilai' => 'required|array',
            'nilai.*' => 'required|numeric|min:0|max:1',
        ]);

        foreach ($request->nilai as $criteria_id => $nilai) {
            Penilaian::updateOrCreate(
                [
                    'santri_id' => $santri->id,
                    'criteria_id' => $criteria_id,
                ],
                [
                    'nilai' => $nilai,
                ]
            );
        }

        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil diperbarui!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $santri = Santri::findOrFail($id);
        $santri->penilaians()->delete();

        return redirect()->route('penilaian.index')->with('success', 'Data penilaian berhasil dihapus.');
    }
}
