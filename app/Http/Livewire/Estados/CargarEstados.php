<?php

namespace App\Http\Livewire\Estados;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\EstadosFinancierosImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\{Cuenta, SubCuenta, CuentaMayor, Catalogo, Periodo};

class CargarEstados extends Component
{
    use WithFileUploads;
 
    public $estadosFinancieros;
    public $periodo;
 
    public function save()
    {
    
        $this->validate([
            'estadosFinancieros' => 'file|max:1024|mimes:xlsx', // 1MB Max
            'periodo'=>'required'
        ]);
        $this->estadosFinancieros->store('public');
        try{
            //recuperando el catálogo de la empresa
            $this->catalogo = Catalogo::firstWhere('empresa_id',Auth::user()->id);
            //recuperando el período seleccionado
            $periodoSeleccionado = Periodo::firstOrCreate([
                'year' => $this->periodo
            ]);
            Excel::import(new EstadosFinancierosImport($this->catalogo,$periodoSeleccionado),$this->estadosFinancieros);
            return session()->flash("success", "Estados Financieros Registrados Correctamente");
        }catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            $failures = $e->failures();
            $messages="Las cuentas ";
            foreach ($failures as $failure) {
                $messages+=$failure->values().", ";
                // $failure->row(); // row that went wrong
                // // $failure->attribute(); // either heading key (if using heading row concern) or column index
                // $failure->errors(); // Actual error messages from Laravel validator
                ; // The values of the row that has failed.
            }
            $messages+=" no se encuentran registradas en el catálogo de cuentas. Necesita revisar los nombres de las cuentas o agregarlas al catálogo de cuentas e intentar de nuevo.";
            return session()->flash("fail", "Errorazo");
        }
        // return response()->json(["cuentas"=>$cuentas]);
        // dd($cuentas->toCollection());
    }
    public function render()
    {
        return view('livewire.estados.cargar-estados');
    }
}
