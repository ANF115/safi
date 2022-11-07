<?php

namespace App\Http\Livewire\Estados;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\EstadosFinancierosImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\{Cuenta, SubCuenta, CuentaMayor, Catalogo, Periodo,PeriodoCuentaM,PeriodoCuenta,PeriodoSubcuenta};
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
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
    // continen las cuentas a ser guardadas
    private $cuentasMayores, $cuentas, $subcuentas;
  
    public function validar(){
        $this->validate([
            'estadosFinancieros' => 'file|max:1024|mimes:xlsx', // 1MB Max
            'periodo'=>'required',
            'fecha_inicio'=> 'required',
            'fecha_fin'=> 'required',
        ]);
        $this->estadosFinancieros->store('public');
        $errorMessage="";
        
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
            
            // Recuperando las cuentas que serán almacenadas
            $this->cuentasMayores=$resultadosBalanceGeneral['cuentasMayores'];
            $this->cuentas=$resultadosBalanceGeneral['cuentas'];
            $this->subcuentas=array_merge($resultadosBalanceGeneral['subcuentas'],$resultadosEstadoResultados['subcuentas']);

            //mostrando mensajes de validación
            if(count($cuentasNoValidasBalanceGeneral)>0 or count($cuentasNoValidasEstadoResultados)>0){
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
            }
            return $errorMessage;
        }catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            // return session()->flash("fail", $e->getMessage());
            $errorMessage.="<h3>".$e->getMessage()."</h3>";
        }
    }
    public function save()
    {
        
        $errores=$this->validar();
        foreach($this->cuentasMayores as $currentCuentaMayor){
            PeriodoCuentaM::updateOrCreate(
                $currentCuentaMayor['filtro'],
                $currentCuentaMayor['update']
            );
        }
        foreach($this->cuentas as $currentCuenta){
            PeriodoCuenta::updateOrCreate(
                $currentCuenta['filtro'],
                $currentCuenta['update']
            );
        }
        foreach($this->subcuentas as $currentSubcuenta){
            PeriodoSubcuenta::updateOrCreate(
                $currentSubcuenta['filtro'],
                $currentSubcuenta['update']
            );
        }
        if(strlen($errores)>0){
            session()->flash("fail", $errores);
        }else{
            session()->flash("success", "Estados Financieros Registrados Correctamente");
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
                if($cuentaMayor and $row[1]!=null){
                    $cuentasMayores[]=[
                            'filtro'=>[
                                'cuenta_mayor_id'=>$cuentaMayor->id, 
                                'periodo_id'=>$this->periodoSeleccionado->id
                            ],
                            'update'=>[
                                'total'=>$row[1]
                            ]
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
                if($cuenta and $row[1]!=null){
                    $cuentas[]=[
                            'filtro'=>[
                                'cuenta_id'=>$cuenta->id, 
                                'periodo_id'=>$this->periodoSeleccionado->id
                            ],
                            'update'=>[
                                'valor'=>$row[1]
                            ]
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
                if($subcuenta and $row[1]!=null){
                    $subcuentas[]=[
                            'filtro'=>[
                                'subcuenta_id'=>$subcuenta->id, 
                                'periodo_id'=>$this->periodoSeleccionado->id
                            ],
                            'update'=>[
                                'valor'=>$row[1]
                            ]
                        ];
                    $this->contadorSubcuentasBalanceGeneral++;
                    unset($rows[$indice]);
                }
    
            }
            $rows = array_values($rows);

            return(['cuentasMayores'=>$cuentasMayores,
                    'cuentas'=>$cuentas,
                    'subcuentas'=>$subcuentas, 
                    'cuentas_no_validas'=>$rows]);
        
        }catch(QueryException $e){
            dd($e->getMessage());
        }
    }
    private function validarEstadoResultados(Array $rows){
        $subcuentas=array();
        try{
            // Fase 3: Encontrar las subcuentas de las cuentas encontradas
            foreach($rows as $indice => $row){
                $subcuenta=DB::table('sub_cuentas')
                ->join('cuentas', 'sub_cuentas.cuenta_id', 'cuentas.id')
                ->join('cuenta_mayors','cuentas.cuenta_mayor_id','cuenta_mayors.id')
                ->join('catalogos', function ($join){
                    $join->on('cuenta_mayors.catalogo_id', '=', 'catalogos.id')
                    ->where('catalogos.id','=',$this->catalogo->id);
                })
                ->where('nombre_subcuenta','ilike','%'.$row[1].'%')
                ->first();
                if($subcuenta and $row[2]!=null){
                    $subcuentas[]=[
                            'filtro'=>[
                                'subcuenta_id'=>$subcuenta->id, 
                                'periodo_id'=>$this->periodoSeleccionado->id
                            ],
                            'update'=>[
                                'valor'=>$row[2]
                            ]
                        ];
                    $this->contadorSubcuentasEstadoResultados++;
                    unset($rows[$indice]);
                }
            }
            $rows = array_values($rows);
            return['subcuentas'=>$subcuentas, 
                    'cuentas_no_validas'=>$rows];
        
        }catch(QueryException $e){
            dd($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.estados.cargar-estados');
    }
}
