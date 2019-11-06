<?php

namespace App\Exports;

use App\Rank;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RanksExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rank::all();
    }
    public function headings(): array
    {
        return [
            'Serial No.',
            'Name',
            'Code',
            'Status',
            'Created_At',
            'Created_By',
            'Updated_At',
            'Updated_By',
        ];
    }
}
