<?php

namespace App\Http\Livewire\Estados;

use Livewire\Component;
use App\Models\Cuenta;
use App\Models\SubCuenta;
use App\Models\Periodo;
use App\Models\PeriodoCuenta;
use App\Models\PeriodoSubCuenta;
use App\Models\PeriodoCuentaM;
use App\Models\CuentaMayor;
use App\Models\Catalogo;
use Illuminate\Support\Facades\Auth;

class RegistrarBalance extends Component
{
    public $codem,$catalogos,$cuentas,$cuentasmay,$subcuentas,$periodos;
    public $periodos_CM,$periodos_cuentas,$periodos_subcuentas;
    public $valor1,$cuenta_id,$periodo_id_1;
    public $valor2,$subcuenta_id,$periodo_id_2;
    public $periodo_id_3,$cuenta_mayor_id;
    public $edit_valor1,$edit_valor2,$selectedCuenta,$selectedSubcuenta;
    public $totalactivos,$totalpasivos,$totalcapital,$totalpasivopatrimonio;

    public function render()
    {
        $codem=Auth::user()->id;
        $this->catalogos = Catalogo::firstWhere('empresa_id',$codem);
        $this->cuentasmay= CuentaMayor::all()->where('catalogo_id',$this->catalogos->id);
        $this->periodos= Periodo::all()->where('catalogo_id',$this->catalogos->id);
        $this->cuentas= Cuenta::all();
        $this->subcuentas= SubCuenta::all();

        
        $this->periodos= Periodo::all()->where('catalogo_id',$this->catalogos->id);
        $this->periodos_CM= PeriodoCuentaM::all();
        $this->periodos_cuentas= PeriodoCuenta::all();
        $this->periodos_subcuentas= PeriodoSubCuenta::all();


        return view('livewire.estados.registrar-balance');
    }

    public function save_cuenta_mayor()
    {   
        $this->validate([

        'cuenta_mayor_id'=> 'required',
        'periodo_id_3'=> 'required',
        
        
    ]);
       
        $newVal = PeriodoCuentaM::create([
            'cuenta_mayor_id'=> $this->cuenta_mayor_id,
            'periodo_id'=> $this->periodo_id_3,
            

        ]);
        $newVal->save();
        $this->clear_cuenta_mayor();
        return session()->flash("success", "Se guardo correctamente");
    }

    public function clear_cuenta_mayor()
    {
        $this->cuenta_mayor_id = '';
        $this->periodo_id_3 = '';
       
    }

    public function save_cuenta()
    {   
        $this->validate([

        'cuenta_id'=> 'required',
        'periodo_id_1'=> 'required',
        'valor1'=> 'required',
        
    ]);
       
        $newVal = PeriodoCuenta::create([
            'cuenta_id'=> $this->cuenta_id,
            'periodo_id'=> $this->periodo_id_1,
            'valor'=> $this->valor1,

        ]);
        $newVal->save();
        $this->clear_cuenta();
        return session()->flash("success", "Se guardo correctamente");
    }

    public function clear_cuenta()
    {
        $this->cuenta_id = '';
        $this->periodo_id_1 = '';
        $this->valor1 = '';
       
        
        
    }

    public function save_subcuenta()
    {   
        
        $this->validate([

        'subcuenta_id'=> 'required',
        'periodo_id_2'=> 'required',
        'valor2'=> 'required',
        
    ]);
       
        $newVal = PeriodoSubCuenta::create([
            'subcuenta_id'=> $this->subcuenta_id,
            'periodo_id'=> $this->periodo_id_2,
            'valor'=> $this->valor2,

        ]);
        $newVal->save();
        $this->clear_subcuenta();
        return session()->flash("success", "Se guardo correctamente");
    }

    public function clear_subcuenta()
    {
        $this->subcuenta_id = '';
        $this->periodo_id_2 = '';
        $this->valor2 = '';
       
        
        
    }

    public function edit_cuenta($value)
    {
        //dd($value);
        $this->clear_edit_cuenta();
        $this->selectedCuenta=PeriodoCuenta::find($value);
        $this->edit_valor1 = PeriodoCuenta::find($value)->valor;
        
        //dd($this->editname);

    }
    public function save_edit_cuenta()
    {   $this->validate([
        'edit_valor1'=> 'required',
        

        ]);
        $this->selectedCuenta->update([
            'valor' => $this->edit_valor1,
            
        ]);
        $this->selectedCuenta->save();
        return session()->flash("success", "Se actualizo correctamente");
    }
    public function clear_edit_cuenta()
    {
        $this->edit_valor1 = '';
    }

    public function edit_subcuenta($value)
    {
        //dd($value);
        $this->clear_edit_subcuenta();
        $this->selectedSubcuenta=PeriodoSubCuenta::find($value);
        $this->edit_valor2 = PeriodoSubCuenta::find($value)->valor;
        
        //dd($this->editname);

    }
    public function save_edit_subcuenta()
    {   $this->validate([
        'edit_valor2'=> 'required',
       

        ]);
        $this->selectedSubcuenta->update([
            'valor' => $this->edit_valor2,
            
        ]);
        $this->selectedSubcuenta->save();
        return session()->flash("success", "Se actualizo correctamente");
    }

    public function clear_edit_subcuenta()
    {
        $this->edit_valor2 = '';
    }





    
}
