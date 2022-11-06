<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class EstadosFinancierosImport implements ToCollection, WithCalculatedFormulas
{
    public function collection(Collection $rows)
    {
        $cuenta=array();
        foreach ($rows as $row) 
        {
            $cuenta[]=([
                            'nombre' => $row[0],
                            'valor'=>$row[1]
                        ]);
        }
        dd($cuenta);
    }
}