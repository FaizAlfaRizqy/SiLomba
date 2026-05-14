<?php

namespace App\Exports;

use App\Models\Lomba;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LombaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lomba::select('nama', 'penyelenggara', 'kategori', 'tingkat', 'deadline', 'status')->get();
    }

    public function headings(): array
    {
        return [
            'Nama Lomba',
            'Penyelenggara',
            'Kategori',
            'Tingkat',
            'Deadline',
            'Status',
        ];
    }
}
