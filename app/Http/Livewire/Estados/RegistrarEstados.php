<?php

namespace App\Http\Livewire\Estados;

use Livewire\Component;
use App\Models\Cuenta;
use App\Models\SubCuenta;
use App\Models\Periodo;
use App\Models\CuentaMayor;


class RegistrarEstados extends Component
{
    public $year,$fecha_inicio,$fecha_fin;


    public function render()
    {
        return view('livewire.estados.registrar-estados');
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
