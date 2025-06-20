<?php

namespace App\Exports;

use App\Models\Criteria;
use App\Models\Santri;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

/**
 * @return \Illuminate\Support\Collection
 */
class PenilaianExport implements FromCollection, WithHeadings, WithMapping
{
    protected $data = [];
    protected $kriteria_list = [];

    public function __construct()
    {
        $this->kriteria_list = Criteria::pluck('nama')->toArray();

        $santris = Santri::with('penilaians.criteria')->get();

        foreach ($santris as $santri) {
            $total = 0;
            $detail_nilai = array_fill_keys($this->kriteria_list, 0);

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

            $this->data[] = (object) [
                'nama' => $santri->nama,
                'nilai_akhir' => round($total, 4),
                'detail' => $detail_nilai,
                'created_at' => $santri->created_at ?? now()
            ];
        }
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return array_merge(
            ['Nama'],
            $this->kriteria_list,
            ['Nilai Akhir', 'Tanggal Ditambahkan']
        );
    }

    public function map($row): array
    {
        return array_merge(
            [$row->nama],
            array_map(fn($v) => number_format($v, 2), $row->detail),
            [number_format($row->nilai_akhir, 2), $row->created_at->format('d-m-Y')]
        );
    }
}
