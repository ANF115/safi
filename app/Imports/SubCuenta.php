<?php

namespace App\Imports;

use App\Models\SubCuenta;
use Maatwebsite\Excel\Concerns\ToModel;

class SubCuenta implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SubCuenta([
            //
        ]);
    }
}
