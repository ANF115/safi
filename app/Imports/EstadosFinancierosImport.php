<?php
namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EstadosFinancierosImport implements WithMultipleSheets 
{
    private $catalogo;
    private $periodo;
    public function  __construct($catalogo, $periodo)
    {
        $this->catalogo= $catalogo;
        $this->periodo=$periodo;
    }  
    public function sheets(): array
    {
        return [
            0 => new BalanceGeneralImport($this->catalogo, $this->periodo),
            1 => new EstadoResultadosImport($this->catalogo, $this->periodo),
        ];
    }
}