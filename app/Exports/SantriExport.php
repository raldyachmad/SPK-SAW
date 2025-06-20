<?php

namespace App\Exports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SantriExport  implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Santri::all();
    }
    // Tentukan heading kolom (baris pertama Excel)
    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'Jenis Kelamin',
            'Tanggal Ditambahkan',
        ];
    }

    // Atur isi tiap baris sesuai urutan headings
    public function map($santri): array
    {
        return [
            $santri->nama,
            $santri->jenis_kelamin,
            $santri->created_at->format('d-m-Y'),
        ];
    }
}
