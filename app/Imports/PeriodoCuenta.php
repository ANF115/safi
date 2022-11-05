<?php

namespace App\Imports;

use App\Models\PeriodoCuenta;
use Maatwebsite\Excel\Concerns\ToModel;

class PeriodoCuenta implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PeriodoCuenta([
            //
        ]);
    }
}
