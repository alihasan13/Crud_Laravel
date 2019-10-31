<?php

namespace App\Exports;

use App\Rank;
use Maatwebsite\Excel\Concerns\FromCollection;

class RanksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rank::all();
    }
}
