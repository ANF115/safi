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
    public $fecha_inicio,$fecha_fin;
    private $catalogo;
 
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
            $periodoSeleccionado = Periodo::firstOrCreate([
                'year' => $this->periodo,
                'fecha_inicio'=> $this->fecha_inicio,
                'fecha_fin' => $this->fecha_fin,
                'catalogo_id' => $this->catalogo->id
            ]);
            // Recuperando datos del archivo excel
            $estadosFinancierosSheets=Excel::toArray(new EstadosFinancierosImport($this->catalogo,$periodoSeleccionado),$this->estadosFinancieros);

            dd($estadosFinancierosSheets);
            return session()->flash("success", "Estados Financieros Registrados Correctamente");
        }catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            return session()->flash("fail", "Errorazo");
        }
    }
    public function render()
    {
        return view('livewire.estados.cargar-estados');
    }
}
