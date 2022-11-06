<?php

namespace App\Http\Livewire\Periodo;

use Livewire\Component;
use App\Models\Periodo;
use App\Models\Catalogo;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class RegistrarPeriodo extends Component
{
    public $year,$fecha_inicio,$fecha_fin,$catalogo_id,$search;
    public $codem,$catalogos,$periodoss;

    use WithPagination;
    public function render()
    {   
        $codem=Auth::user()->id;
        $this->catalogos = Catalogo::firstWhere('empresa_id',$codem);
        $this->periodoss= Periodo::all()->where('catalogo_id',$this->catalogos->id);  
        return view('livewire.periodo.registrar-periodo',[
            'periodos' => Periodo::where('year', 'like', '%' . $this->search . '%')->paginate(5),
        ]);
    }

    public function save_periodo()
    {   $this->validate([

        'year'=> 'required',
        'fecha_inicio'=> 'required',
        'fecha_fin'=> 'required',
        'catalogo_id'=> 'required',
    ]);
       
        $newVal = Periodo::create([
            'year'=> $this->year,
            'fecha_inicio'=> $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'catalogo_id' => $this->catalogo_id,
            
        ]);
        $newVal->save();
        $this->clear_periodo();
        return session()->flash("success", "Se guardo correctamente");
    }

    public function clear_periodo()
    {
        $this->year = '';
        $this->fecha_inicio = '';
        $this->fecha_fin = '';
        $this->catalogo_id = '';
        
        
    }
}
