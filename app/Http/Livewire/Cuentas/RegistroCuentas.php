<?php

namespace App\Http\Livewire\Cuentas;

use Livewire\Component;
use App\Models\Cuenta;
use App\Models\CuentaMayor;
use Livewire\WithPagination;

class RegistroCuentas extends Component
{
    public $search,$cuenta_mayor_id,$nombre_cuenta,$codigo_cuenta,$selectedCuenta,$deleteCuenta_id;

    protected $rules = [

        
        
        'cuenta_mayor_id'=> 'required',
        'codigo_cuenta'=> 'required',
        'nombre_cuenta'=> 'required',
        
        
        

    ];

    use WithPagination;

    public function render()
    {   $this->cuentas= Cuenta::all();
        $this->cuentass= Cuenta::all();
        $this->cuentasmay= CuentaMayor::all();
        return view('livewire.cuentas.registro-cuentas',[
            'cuentas' => Cuenta::where('nombre_cuenta', 'like', '%' . $this->search . '%')->paginate(5),
        ]);
    }

    public function save()
    {   $this->validate();
       
        $newVal = Cuenta::create([
            'cuenta_mayor_id'=> $this->cuenta_mayor_id,
            'codigo_cuenta'=> $this->codigo_cuenta,
            'nombre_cuenta' => $this->nombre_cuenta,
            
        ]);
        $newVal->save();
        $this->clear();
        return session()->flash("success", "Se guardo correctamente");
    }

    public function clear()
    {
        $this->cuenta_mayor_id = '';
        $this->codigo_cuenta = '';
        $this->nombre_cuenta = '';
        
        
    }

    public function edit($value)
    {
        //dd($value);
        $this->clear();
        $this->selectedCuenta=Cuenta::find($value);
        $this->cuenta_mayor_id = Cuenta::find($value)->cuenta_mayor_id;
        $this->codigo_cuenta = Cuenta::find($value)->codigo_cuenta;
        $this->nombre_cuenta = Cuenta::find($value)->nombre_cuenta;
        //dd($this->editname);

    }
    public function save_edit()
    {   $this->validate();
        $this->selectedCuenta->update([
            'cuenta_mayor_id' => $this->cuenta_mayor_id,
            'codigo_cuenta' => $this->codigo_cuenta,
            'nombre_cuenta'=> $this->nombre_cuenta,
        ]);
        return session()->flash("success", "Se actualizo correctamente");
    }
    public function delete($value)
    {
        $this->deleteCuenta_id = $value;
    }
    public function delete_now()
    {
        Cuenta::find($this->deleteCuenta_id)->delete();
        return session()->flash("success", "Se elimino correctamente");
    }
}