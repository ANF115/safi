<?php

namespace App\Http\Livewire\Periodo;

use Livewire\Component;
use App\Models\Periodo;

class RegistrarPeriodo extends Component
{
    public $year,$fecha_inicio,$fecha_fin;



    public function render()
    {
        return view('livewire.periodo.registrar-periodo');
    }

    public function save_periodo()
    {   $this->validate([

        'year'=> 'required',
        'fecha_inicio'=> 'required',
        'fecha_fin'=> 'required',
    ]);
       
        $newVal = Periodo::create([
            'year'=> $this->year,
            'fecha_inicio'=> $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            
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
        
        
    }
}
