<?php

namespace App\Imports;

use App\Models\{Cuenta, PeriodoCuentaM,SubCuenta, CuentaMayor};
use Exception;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
class BalanceGeneralImport implements ToCollection, WithCalculatedFormulas, SkipsOnFailure, SkipsOnError
{
    use SkipsFailures,Importable, SkipsErrors;
    private $catalogo;
    private $periodo;
    private $nombre_cuenta, $valor;
    // errores es un string que contiene un mensaje por cada insersión que fallo.
    public $errores;
    public $contadorErrores;
    // los contadores son para saber cuantas cuentas se guardaron
    public $contadorCuentasMayores;
    public $contadorCuentas;
    public $contadorSubCuentas;
    public $contadorCuentasMayoresTotal;
    public $contadorCuentasTotal;
    public $contadorSubCuentasTotal;
    public function  __construct($catalogo, $periodo)
    {
        $this->catalogo= $catalogo;
        $this->periodo= $periodo;
        $this->errores="Errores: \n";
        $this->contadorErrores=0;
        $this->contadorCuentasMayores=0;
        $this->contadorCuentas=0;
        $this->contadorSubCuentas=0;
        $this->contadorCuentasMayoresTotal=0;
        $this->contadorCuentasTotal=0;
        $this->contadorSubCuentasTotal=0;
    }


    public function collection(Collection $rows)
    {

        foreach ($rows as $row) 
        {
            $this->valor=$row[1];
            $this->nombre_cuenta=$row[0];
            //Buscando cuenta
            // $periodoCuentaMayor=PeriodoCuentaM::with(['cuenta_mayor','periodo'])->where('cuenta_mayor.nombre_cuenta_mayor',$nombre_cuenta)->first();
            try{
                $cuentaMayor=CuentaMayor::where('catalogo_id','=',$this->catalogo->id)
                ->where('nombre_cuenta_mayor', 'like','%'.$this->nombre_cuenta.'%')
                ->first();
            }catch(QueryException $e){
                
                // // dd($e->getMessage());
                // $cuenta=Cuenta::where('nombre_cuenta', 'like','%'.$this->nombre_cuenta.'%')
                // ->join('cuenta_mayors', function($join){
                //     $join->on('periodo_cuenta_m_s.cuenta_mayor_id','=','cuenta_mayors.id')
                //     ->where('cuenta_mayors.nombre_cuenta_mayor', 'like','%'.$this->nombre_cuenta.'%');
                // })
                // ->firstOrFail();
            }catch(QueryException $e){
                
                // // dd($e->getMessage());
                // $subcuenta=SubCuenta::where('nombre_subcuenta', 'like','%'.$this->nombre_cuenta.'%')
                // ->join('cuenta_mayors', function($join){
                //     $join->on('periodo_cuenta_m_s.cuenta_mayor_id','=','cuenta_mayors.id')
                //     ->where('cuenta_mayors.nombre_cuenta_mayor', 'like','%'.$this->nombre_cuenta.'%');
                // })
                // ->firstOrFail();
            }
            if($cuentaMayor){
                try{
                    $isSaved=DB::table('periodo_cuenta_m_s')
                    ->updateOrInsert(
                        ['cuenta_mayor_id'=>$cuentaMayor->id, 'periodo_id'=>$this->periodo->id],
                        ['total'=>$this->valor]
                    );
                    $this->contadorCuentasMayoresTotal++;
                    if($isSaved){
                        $this->contadorCuentasMayores++;
                    } 
                }catch(Exception $e){
                    $this->contadorErrores++;
                    $this->errores.="La Cuenta Mayor ".$cuentaMayor->nombre_cuenta_mayor." no se guardo correctamente. Intentar de nuevo.\n";
                }
            }
            // if(!$cuentaMayor){
                //     dd($cuentaMayor);
                // }
            // Si es cuenta entonces guardamos el valor
            
           
                // dd($cuentaMayor);
                // Buscando si es cuenta
                // $cuenta=CuentaMayor::where('catalogo','=',$this->catalogo)
                //             ->where('nombre_cuenta_mayor', 'like','%'.$this->nombre_cuenta.'%')
                //             ->first();
                // $periodoCuentaMayor=DB::table('periodo_cuenta_m_s')
                //     ->join('cuenta_mayors', function($join){
                //         $join->on('periodo_cuenta_m_s.cuenta_mayor_id','=','cuenta_mayors.id')
                //         ->where('cuenta_mayors.nombre_cuenta_mayor', 'like','%'.$this->nombre_cuenta.'%');
                //     })
                //     ->join('periodos', function($join){
                //         $join->on('periodo_cuenta_m_s.periodo_id','=','periodos.id')
                //         ->where('periodos.id', '=',$this->periodo->id);
                //     })
                //     ->first();
            
            // $periodoCuentaMayor=DB::table('periodo_cuenta_m_s')
            //     ->join('cuenta_mayors', function($join){
            //         $join->on('periodo_cuenta_m_s.cuenta_mayor_id','=','cuenta_mayors.id')
            //         ->where('cuenta_mayors.nombre_cuenta_mayor', 'like','%'.$this->nombre_cuenta.'%');
            //     })
            //     ->join('periodos', function($join){
            //         $join->on('periodo_cuenta_m_s.periodo_id','=','periodos.id')
            //         ->where('periodos.id', '=',$this->periodo->id);
            //     })
            //     ->first();
                
    
            // dd($periodoCuentaMayor);
            // Encontrando la cuenta mayor
            // PeriodoCuentaM::where('cuenta_mayor_id',)->where('periodo_id',)->where('total',)->firstOr(function () {
            //     // Encontrando la cuenta
            //     // Encontrando la subcuenta
            // });
            

        }
    }

}