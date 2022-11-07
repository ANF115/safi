<?php

namespace App\Http\Livewire\Estados;

use Livewire\Component;
use App\Models\Cuenta;
use App\Models\SubCuenta;
use App\Models\Periodo;
use App\Models\CuentaMayor;
use App\Models\Catalogo;
use Illuminate\Support\Facades\Auth;


class RegistrarEstados extends Component
{
    public $year,$fecha_inicio,$fecha_fin;
    public $codem,$catalogos,$cuentas,$cuentasmay,$subcuentas;

    public function render()
    {   
        $codem=Auth::user()->id;
        $this->catalogos = Catalogo::firstWhere('empresa_id',$codem);
        $this->cuentasmay= CuentaMayor::all()->where('catalogo_id',$this->catalogos->id);
        $this->cuentas= Cuenta::all();
        $this->subcuentas= SubCuenta::all();
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
