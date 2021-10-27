<?php

namespace App\Imports;

use App\Models\GeneralList;
use Maatwebsite\Excel\Concerns\ToModel;

class GeneralListImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new GeneralList([
        //     'name' =>$row['name'],
        //     'district_categories' =>$row['district_categories'],
        //     'owner_id' =>$row['owner_id'],
        //     'reg_no' =>$row['reg_no'],
        //     'year' =>$row['year'],
        //     'staffing_id' =>$row['staffing_id'],
        //     'licence_no' =>$row['licence_no'],
        //     'doctor_incharge_id' =>$row['doctor_incharge_id'],
        //     'inspection_date' =>$row['inspection_date'],
        //     'license_reg_date' =>$row['license_reg_date'],
        //     'service_delivery' =>$row['service_delivery'],
        //     'location' =>$row['location'],
        //     'phone_no' =>$row['phone_no'],
        //     'status' =>$row['status'],    
        // ]);
    }
}
