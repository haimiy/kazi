<?php

namespace App\Imports;

use App\Models\hospitalStatistics;
use Maatwebsite\Excel\Concerns\ToModel;

class hospitalStatisticsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new hospitalStatistics([
            'starting_year' => $row[0],
            'health_facility' => $row[1],
            'hospital_no' => $row[3],
        ]);
    }
}
