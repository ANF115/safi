<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class BalanceGeneralImport implements ToArray,WithCalculatedFormulas
{
    public function array(array $row){}
    public function collection(Collection $rows){}
}