<?php

namespace App\Exports;

use App\Models\hospitalStatistics;
use Maatwebsite\Excel\Concerns\FromCollection;

class hospitalStatisticsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return hospitalStatistics::all();
    }
}
