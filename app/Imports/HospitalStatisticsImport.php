<?php

namespace App\Imports;

use App\Models\HospitalStatistics;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HospitalStatisticsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
//        dd($row);
       return new HospitalStatistics([
            'starting_year' => $row['starting_year'],
            'health_facility' => $row['health_facility'],
            'hospital_no' => $row['hospital_no'],
        ]);
    }
}
