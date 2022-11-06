<?php

namespace App\Imports;

use App\Models\{Cuenta, PeriodoCuentaM, CuentaMayor};
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Facades\DB;

class BalanceGeneralImport implements ToCollection, WithCalculatedFormulas
{
    private $catalogo;
    private $periodo;
    private $nombre_cuenta, $valor;
    public function  __construct($catalogo, $periodo)
    {
        $this->catalogo= $catalogo;
        $this->periodo= $periodo;
    }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $this->valor=$row[1];
            $this->nombre_cuenta=$row[0];
            //Buscando Subcuenta
            // $periodoCuentaMayor=PeriodoCuentaM::with(['cuenta_mayor','periodo'])->where('cuenta_mayor.nombre_cuenta_mayor',$nombre_cuenta)->first();
            $periodoCuentaMayor=DB::table('periodo_cuenta_m_s')
                ->join('cuenta_mayors', function($join){
                    $join->on('periodo_cuenta_m_s.cuenta_mayor_id','=','cuenta_mayors.id')
                    ->where('cuenta_mayors.nombre_cuenta_mayor', 'like','%'.$this->nombre_cuenta.'%');
                })
                ->join('periodos', function($join){
                    $join->on('periodo_cuenta_m_s.periodo_id','=','periodos.id')
                    ->where('periodos.id', '=',$this->periodo->id);
                })
                ->first();
            $periodoCuentaMayor->total=$this->valor;
            $periodoCuentaMayor->save();
    
            dd($periodoCuentaMayor);
            // Encontrando la cuenta mayor
            // PeriodoCuentaM::where('cuenta_mayor_id',)->where('periodo_id',)->where('total',)->firstOr(function () {
            //     // Encontrando la cuenta
            //     // Encontrando la subcuenta
            // });

        }
    }
}