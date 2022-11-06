<?php

namespace App\Imports;

use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Ramsey\Uuid\Type\Integer;

class CuentaExcel implements OnEachRow
{
    private static Integer $cuentaMayorContador;
    private static Integer $cuentaContador;
    private static Integer $subCuentaContador;

    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();
        
        $group = Group::firstOrCreate([
            'name' => $row[1],
        ]);
    
        $group->users()->create([
            'name' => $row[0],
        ]);
    }
 
}
