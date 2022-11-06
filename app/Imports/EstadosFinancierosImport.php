<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class EstadosFinancierosImport implements ToCollection
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