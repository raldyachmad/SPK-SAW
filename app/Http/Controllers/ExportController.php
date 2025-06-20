<?php

namespace App\Http\Controllers;

use App\Exports\CriteriaExport;
use App\Exports\SantriExport;
use App\Exports\PenilaianExport;
use App\Models\Criteria;
use App\Models\Penilaian;
use App\Models\Santri;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    // Santri
    public function exportSantriExcel()
    {
        return Excel::download(new SantriExport, 'data-santri-' . now()->format('d-m-Y') . '.xlsx');
    }
    public function exportSantriCsv()
    {
        return Excel::download(new SantriExport, 'data-santri-' . now()->format('d-m-Y') . '.csv');
    }
    public function exportSantriPdf()
    {
        $santris = Santri::all();
        $pdf = Pdf::loadView('santri.export', compact('santris'));
        return $pdf->download('data-santri-' . now()->format('d-m-Y') . '.pdf');
    }

    // Kriteria
    public function exportCriteriaExcel()
    {
        return Excel::download(new CriteriaExport, 'data-kriteria-' . now()->format('d-m-Y') . '.xlsx');
    }
    public function exportCriteriaCsv()
    {
        return Excel::download(new CriteriaExport, 'data-kriteria-' . now()->format('d-m-Y') . '.csv');
    }
    public function exportCriteriaPdf()
    {
        $criterias = Criteria::all();
        $pdf = Pdf::loadView('criteria.export', compact('criterias'));
        return $pdf->download('data-kriteria-' . now()->format('d-m-Y') . '.pdf');
    }

    // Penilaian
    public function exportPenilaianExcel()
    {
        return Excel::download(new PenilaianExport, 'data-penilaian-' . now()->format('d-m-Y') . '.xlsx');
    }
    public function exportPenilaianCsv()
    {
        return Excel::download(new PenilaianExport, 'data-penilaian-' . now()->format('d-m-Y') . '.csv');
    }
    public function getPenilaianSAW()
    {
        $santris = Santri::with('penilaians.criteria')->get();
        $kriteria_list = Criteria::pluck('nama')->toArray();

        $hasil = [];

        foreach ($santris as $santri) {
            $total = 0;
            $detail_nilai = array_fill_keys($kriteria_list, 0);

            foreach ($santri->penilaians as $penilaian) {
                if (!$penilaian->criteria) continue;

                $nilai = $penilaian->nilai;
                $bobot = $penilaian->criteria->bobot;
                $atribut = strtolower($penilaian->criteria->atribut);
                $nama_kriteria = $penilaian->criteria->nama;

                $normalisasi = $atribut === 'benefit' ? $nilai : 1 - $nilai;
                $terbobot = $normalisasi * $bobot;
                $total += $terbobot;

                $detail_nilai[$nama_kriteria] = round($terbobot, 4);
            }

            $hasil[] = [
                'id' => $santri->id,
                'nama' => $santri->nama,
                'nilai_akhir' => round($total, 4),
                'detail' => $detail_nilai
            ];
        }

        usort($hasil, fn($a, $b) => $b['nilai_akhir'] <=> $a['nilai_akhir']);

        return $hasil;
    }
    public function exportPenilaianPdf()
    {
         $hasil = $this->getPenilaianSAW(); // panggil fungsi SAW
    return Pdf::loadView('penilaian.export', compact('hasil'))
              ->download('data-penilaian-' . now()->format('d-m-Y') . '.pdf');
    }
}
