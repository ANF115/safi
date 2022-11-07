<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class EstadoResultadosImport implements ToCollection, WithCalculatedFormulas
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
        // Validando que todas las cuentas existen en el catálogo de cuentas
        foreach ($rows as $row) 
        {
            $cuenta[]=([
                            'nombre' => $row[1],
                            'valor'=>$row[2]
                        ]);
        }
        // foreach ($rows as $row) 
        // {
        //     $cuenta[]=([
        //                     'nombre' => $row[1],
        //                     'valor'=>$row[2]
        //                 ]);
        // }
        // dd($cuenta);
    }
}