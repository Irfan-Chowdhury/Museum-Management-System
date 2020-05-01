<?php

namespace App\Imports;

use App\Models\Visitor;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Visitor([
            'user_id'           =>  $row[1], //From xlsx start from B Coloumn that's why column-1
            'visitor_name'      =>  $row[2],
            'visitor_email'     =>  $row[3],
            'visitor_phone'     =>  $row[4],
            'visitor_address'   =>  $row[5],
            'visitor_id_no'     =>  $row[6],
        ]);
    }
}
