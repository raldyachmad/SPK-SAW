<?php

namespace App\Exports;

use App\Models\Criteria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CriteriaExport implements FromCollection, WithHeadings, WithMapping{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        return Criteria::all();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Bobot',
            'Atribut',
            'Tanggal Ditambahkan',
        ];
    }

    // Atur isi tiap baris sesuai urutan headings
    public function map($criteria): array
    {
        return [
            $criteria->nama,
            $criteria->bobot,
            $criteria->atribut,
            $criteria->created_at ? $criteria->created_at->format('d-m-Y') : '-', // ✅ aman dari null
        ];
    }
}
