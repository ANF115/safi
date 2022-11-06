<?php

namespace App\Http\Livewire\Estados;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\EstadosFinancierosImport;
use Maatwebsite\Excel\Facades\Excel;

class CargarEstados extends Component
{
    use WithFileUploads;
 
    public $estadosFinancieros;
 
    public function save()
    {
        $this->validate([
            'estadosFinancieros' => 'file|max:1024|mimes:xlsx', // 1MB Max
        ]);
        $this->estadosFinancieros->store('public');
        Excel::import(new EstadosFinancierosImport,$this->estadosFinancieros);
        // return response()->json(["cuentas"=>$cuentas]);
        // dd($cuentas->toCollection());
    }
    public function render()
    {
        return view('livewire.estados.cargar-estados');
    }
}
