<?php

namespace App\Http\Livewire\Estados;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\EstadosFinancierosImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\{Cuenta, SubCuenta, CuentaMayor, Catalogo, Periodo};
use Illuminate\Database\QueryException;
class CargarEstados extends Component
{
    use WithFileUploads;
 
    public $estadosFinancieros;
    public $periodo;
    public $fecha_inicio,$fecha_fin;
    private $catalogo, $periodoSeleccionado;
    // los contadores guardan la cantidad de cuentas válidas del balance general
    private $contadorCuentasMayoresBalanceGeneral;
    private $contadorCuentasBalanceGeneral;
    private $contadorSubcuentasBalanceGeneral;
    // los contadores guardan la cantidad de cuentas válidas del estado de resultados
    private $contadorCuentasMayoresEstadoResultados;
    private $contadorCuentasEstadoResultados;
    private $contadorSubcuentasEstadoResultados;
  
 
    public function save()
    {
    
        $this->validate([
            'estadosFinancieros' => 'file|max:1024|mimes:xlsx', // 1MB Max
            'periodo'=>'required',
            'fecha_inicio'=> 'required',
            'fecha_fin'=> 'required',
        ]);
        $this->estadosFinancieros->store('public');
        try{
            //recuperando el catálogo de la empresa
            $this->catalogo = Catalogo::firstWhere('empresa_id',Auth::user()->id);
            //recuperando el período seleccionado
            $this->periodoSeleccionado = Periodo::firstOrCreate([
                'year' => $this->periodo,
                'fecha_inicio'=> $this->fecha_inicio,
                'fecha_fin' => $this->fecha_fin,
                'catalogo_id' => $this->catalogo->id
            ]);
            // Recuperando datos del archivo excel
            $estadosFinancierosSheets=Excel::toArray(new EstadosFinancierosImport(),$this->estadosFinancieros);
            // Validando Estados Financieros
            $resultadosBalanceGeneral=$this->validarBalanceGeneral($estadosFinancierosSheets[0]);
            $resultadosEstadoResultados=$this->validarEstadoResultados($estadosFinancierosSheets[1]);
            // Notificando al usuario si hay cuentas no válidas de los estados financieros
            $cuentasNoValidasBalanceGeneral=$resultadosBalanceGeneral['cuentas_no_validas'];
            $cuentasNoValidasEstadoResultados=$resultadosEstadoResultados['cuentas_no_validas'];
            
            if(count($cuentasNoValidasBalanceGeneral)>0 or count($cuentasNoValidasEstadoResultados)>0){
                $errorMessage="";
                if(count($cuentasNoValidasBalanceGeneral)>0){
                    $errorMessage.="<h3>Balance General:</h3>";
                    foreach ($cuentasNoValidasBalanceGeneral as $cuentaNoValida) {
                        $errorMessage.="<br/>".$cuentaNoValida[0];
                    }
                }
                if(count($cuentasNoValidasEstadoResultados)>0){
                    $errorMessage.="<br/><h3>Estado de Resultados:</h3>";
                    foreach ($cuentasNoValidasEstadoResultados as $cuentaNoValida) {
                        $errorMessage.="<br/>".$cuentaNoValida[1];
                    }
                }
                $errorMessage.="<h3>Modificar el Catálogo de Cuentas y Volver a Intentar.</h3>";
                return session()->flash("fail", $errorMessage);
            }else{
                // return session()->flash("success", "Estados Financieros Registrados Correctamente");
                return session()->flash("success", "A guardar!");
            }
        }catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            return session()->flash("fail", $e->getMessage());
        }
    }
    private function validarBalanceGeneral(Array $datos){
        $cuentasMayores=array();
        $cuentasMayoresIDs=array();
        $cuentas=array();
        $cuentasIDs=array();
        $subcuentas=array();
        $rows=$datos;
        try{
            // FASE 1: Encontrar la cuentas mayores
            foreach ($rows as $indice => $row){
                $cuentaMayor=CuentaMayor::where('catalogo_id','=',$this->catalogo->id)
                ->where('nombre_cuenta_mayor','ilike','%'.$row[0].'%')
                ->first();
                if($cuentaMayor){
                    $cuentasMayores[]=[
                        'cuenta_mayor_id'=>$cuentaMayor->nombre_cuenta_mayor, 
                        'periodo_id'=>$this->periodoSeleccionado->id,
                        'total'=>$row[1]
                        ];
                    $cuentasMayoresIDs[]=$cuentaMayor->id;
                    $this->contadorCuentasMayoresBalanceGeneral++;
                    unset($rows[$indice]);
                }
                
            }
            $rows = array_values($rows);
            // Fase 2: Encontrar las cuentas de las cuentas mayores encontradas
            foreach($rows as $indice => $row){
                $cuenta=Cuenta::whereIn('cuenta_mayor_id',$cuentasMayoresIDs)
                ->where('nombre_cuenta','ilike','%'.$row[0].'%')
                ->first();
                if($cuenta){
                    $cuentas[]=[
                        'cuenta_id'=>$cuenta->nombre_cuenta, 
                        'periodo_id'=>$this->periodoSeleccionado->id,
                        'valor'=>$row[1]
                        ];
                    $cuentasIDs[]=$cuenta->id;
                    $this->contadorCuentasBalanceGeneral++;
                    unset($rows[$indice]);
                }
            }
            $rows = array_values($rows);
            // Fase 3: Encontrar las subcuentas de las cuentas encontradas
            foreach($rows as $indice => $row){
                $subcuenta=SubCuenta::whereIn('cuenta_id',$cuentasIDs)
                ->where('nombre_subcuenta','ilike','%'.$row[0].'%')
                ->first();
                if($subcuenta){
                    $subcuentas[]=[
                        'subcuenta_id'=>$subcuenta->nombre_subcuenta, 
                        'periodo_id'=>$this->periodoSeleccionado->id,
                        'valor'=>$row[1]
                        ];
                    $this->contadorSubcuentasBalanceGeneral++;
                    unset($rows[$indice]);
                }
    
            }
            $rows = array_values($rows);
            dd($rows);
            // dd(['cuentasMayores'=>$cuentasMayores,
            //         'cuentas'=>$cuentas,
            //         'subcuentas'=>$subcuentas, 
            //         'cuentas_no_validas'=>$rows]);
        
        }catch(QueryException $e){
            dd($e->getMessage());
        }
    }
    private function validarEstadoResultados(Array $rows){
        $cuentasMayores=array();
        $cuentasMayoresIDs=array();
        $cuentas=array();
        $cuentasIDs=array();
        $subcuentas=array();
        try{
            // FASE 1: Encontrar la cuentas mayores
            foreach ($rows as $indice => $row){
                $cuentaMayor=CuentaMayor::where('catalogo_id','=',$this->catalogo->id)
                ->where('nombre_cuenta_mayor','ilike','%'.$row[1].'%')
                ->first();
                if($cuentaMayor){
                    $cuentasMayores[]=[
                        'cuenta_mayor_id'=>$cuentaMayor->id, 
                        'periodo_id'=>$this->periodoSeleccionado->id,
                        'total'=>$row[2]
                        ];
                    $cuentasMayoresIDs[]=$cuentaMayor->id;
                    $this->contadorCuentasMayoresEstadoResultados++;
                    array_splice($rows,$indice,1);
                }

            }
            // Fase 2: Encontrar las cuentas de las cuentas mayores encontradas
            foreach($rows as $indice => $row){
                $cuenta=Cuenta::whereIn('cuenta_mayor_id',$cuentasMayoresIDs)
                ->where('nombre_cuenta','ilike','%'.$row[1].'%')
                ->first();
                if($cuenta){
                    $cuentas[]=[
                        'cuenta_id'=>$cuenta->id, 
                        'periodo_id'=>$this->periodoSeleccionado->id,
                        'valor'=>$row[2]
                        ];
                    $cuentasIDs[]=$cuenta->id;
                    $this->contadorCuentasEstadoResultados++;
                    array_splice($rows,$indice,1);
                }
            }
            // Fase 3: Encontrar las subcuentas de las cuentas encontradas
            foreach($rows as $indice => $row){
                $subcuenta=SubCuenta::whereIn('cuenta_id',$cuentasIDs)
                ->where('nombre_subcuenta','ilike','%'.$row[1].'%')
                ->first();
                if($subcuenta){
                    $subcuentas[]=[
                        'subcuenta_id'=>$subcuenta->id, 
                        'periodo_id'=>$this->periodoSeleccionado->id,
                        'valor'=>$row[2]
                        ];
                    $this->contadorSubcuentasEstadoResultados++;
                    array_splice($rows,$indice,1);
                }
            }
            return['cuentasMayores'=>$cuentasMayores,
                    'cuentas'=>$cuentas,
                    'subcuentas'=>$subcuentas, 
                    'cuentas_no_validas'=>$rows];
        
        }catch(QueryException $e){
            dd($e->getMessage());
        }
    }
    private function guardarBalanceGeneral(){

    }

    public function render()
    {
        return view('livewire.estados.cargar-estados');
    }
}
