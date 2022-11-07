<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class BalanceGeneralImport implements ToCollection, WithCalculatedFormulas
{
    private $catalogo;
    private $periodo;
    public function  __construct($catalogo, $periodo)
    {
        $this->catalogo= $catalogo;
        $this->periodo= $periodo;
    }
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
        // dd($cuenta);
    }
}