<?php
namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EstadosFinancierosImport implements WithMultipleSheets 
{
    public function sheets(): array
    {
        return [
            0 => new BalanceGeneralImport(),
            1 => new EstadoResultadosImport(),
        ];
    }
}