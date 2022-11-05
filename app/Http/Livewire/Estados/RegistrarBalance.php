<?php

namespace App\Http\Livewire\Estados;

use Livewire\Component;
use App\Models\Cuenta;
use App\Models\SubCuenta;
use App\Models\Periodo;
use App\Models\CuentaMayor;
use App\Models\Catalogo;
use Illuminate\Support\Facades\Auth;

class RegistrarBalance extends Component
{
    public $codem,$catalogos,$cuentas,$cuentasmay,$subcuentas;

    public function render()
    {
        $codem=Auth::user()->id;
        $this->catalogos = Catalogo::firstWhere('empresa_id',$codem);
        $this->cuentasmay= CuentaMayor::all()->where('catalogo_id',$this->catalogos->id);
        $this->cuentas= Cuenta::all();
        $this->subcuentas= SubCuenta::all();
        return view('livewire.estados.registrar-balance');
    }

    
}
