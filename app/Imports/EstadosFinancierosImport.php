<?php

// namespace App\Imports;

// use Maatwebsite\Excel\Row;
// use Maatwebsite\Excel\Concerns\OnEachRow;
// use Ramsey\Uuid\Type\Integer;

// class EstadosFinancierosImport implements OnEachRow
// {
//     private static Integer $cuentaMayorContador;
//     private static Integer $cuentaContador;
//     private static Integer $subCuentaContador;

//     public function onRow(Row $row)
//     {
//         $rowIndex = $row->getIndex();
//         $row      = $row->toArray();
        
//         // $group = Group::firstOrCreate([
//         //     'name' => $row[1],
//         // ]);
    
//         // $group->users()->create([
//         //     'name' => $row[0],
//         // ]);
//     }
 
// }

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
        // foreach ($rows as $row) 
        // {
        //     $cuenta[]=([
        //         'name' => $row[0],
        //     ]);
        // }
        // return $cuenta;
        dd($cuenta);
    }
}