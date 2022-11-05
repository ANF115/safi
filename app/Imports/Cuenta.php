<?php

namespace App\Imports;

use App\Models\Cuenta;
use Maatwebsite\Excel\Concerns\ToModel;

class Cuenta implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cuenta([
            //
        ]);
    }
}
