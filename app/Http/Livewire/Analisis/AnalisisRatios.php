<?php

namespace App\Http\Livewire\Analisis;

use Livewire\Component;
use App\Models\Catalogo;
use App\Models\Periodo;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AnalisisRatios extends Component
{
    //Definiendo variables
    public $codEmpresa;
    public function render()
    {
        //Consultando periodos de la empresa
        $codEmpresa=Auth::user()->id;
        $this->catalogos = Catalogo::firstWhere('empresa_id',$codEmpresa);
        $this->periodos= Periodo::all()->where('catalogo_id',$this->catalogos->id);
        dd($this->periodos);
        return view('livewire.analisis.analisis-ratios');
    }
}
