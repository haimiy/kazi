<?php

namespace App\Imports;

use App\Models\HistoryHealthFacility;
use Maatwebsite\Excel\Concerns\ToModel;

class HospitalStatisticsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $array = new HistoryHealthFacility([
        //     'facility_name' => $row[0],
        //     'reg_no' => $row[1],
        //     'district_name' => $row[2],
        //     'type_of_health_unit' => $row[3],
        //     'starting_operation_date' => $row[4],
        //     'full_name' => $row[5],
        //     'phone_no' => $row[6],
        //     'location' => $row[7],
        //     'service_name' => $row[8],
        // ]);
        dd($row);
    }
}
