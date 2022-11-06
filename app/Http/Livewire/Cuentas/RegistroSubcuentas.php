<?php

namespace App\Http\Livewire\Cuentas;

use Livewire\Component;
use App\Models\Cuenta;
use App\Models\SubCuenta;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

use App\Models\CuentaMayor;
use App\Models\Catalogo;

class RegistroSubcuentas extends Component
{
    public $search,$cuenta_id,$nombre_subcuenta,$codigo_subcuenta,$selectedSubCuenta,$deleteSubCuenta_id;
    public $edit_cuenta_id,$edit_nombre_subcuenta,$edit_codigo_subcuenta;
    public $codem,$catalogos,$cuentas,$cuentasmay;
    protected $rules = [

        'cuenta_id'=> 'required',
        'codigo_subcuenta'=> 'required',
        'nombre_subcuenta'=> 'required',
    ];

    use WithPagination;
    public function render()
    {   $codem=Auth::user()->id;
        $this->catalogos = Catalogo::firstWhere('empresa_id',$codem);
        $this->cuentasmay= CuentaMayor::all()->where('catalogo_id',$this->catalogos->id);
        $this->cuentas= Cuenta::all();
        
        $this->subcuentass= SubCuenta::all();


        return view('livewire.cuentas.registro-subcuentas',[
            'subcuentas' => SubCuenta::where('nombre_subcuenta', 'like', '%' . $this->search . '%')->paginate(60),
        ]);
    }

    public function save()
    {   $this->validate();
       
        $newVal = SubCuenta::create([
            'cuenta_id'=> $this->cuenta_id,
            'codigo_subcuenta'=> $this->codigo_subcuenta,
            'nombre_subcuenta' => $this->nombre_subcuenta,
            
        ]);
        $newVal->save();
        $this->clear();
        return session()->flash("success", "Se guardo correctamente");
    }

    public function clear()
    {
        $this->cuenta_id = '';
        $this->codigo_subcuenta = '';
        $this->nombre_subcuenta = '';
        
        
    }

    public function clear_edit()
    {
        $this->edit_cuenta_id = '';
        $this->edit_codigo_subcuenta = '';
        $this->edit_nombre_subcuenta = '';
        
        
    }

    public function edit($value)
    {
        //dd($value);
        $this->clear_edit();
        $this->selectedSubCuenta=SubCuenta::find($value);
        $this->edit_cuenta_id = SubCuenta::find($value)->cuenta_id;
        $this->edit_codigo_subcuenta = SubCuenta::find($value)->codigo_subcuenta;
        $this->edit_nombre_subcuenta = SubCuenta::find($value)->nombre_subcuenta;
        //dd($this->editname);

    }
    public function save_edit()
    {   $this->validate([
        'edit_cuenta_id'=> 'required',
        'edit_codigo_subcuenta'=> 'required',
        'edit_nombre_subcuenta'=> 'required',

        ]);
        $this->selectedSubCuenta->update([
            'cuenta_id' => $this->edit_cuenta_id,
            'codigo_subcuenta' => $this->edit_codigo_subcuenta,
            'nombre_subcuenta'=> $this->edit_nombre_subcuenta,
        ]);
        $this->selectedSubCuenta->save();
        return session()->flash("success", "Se actualizo correctamente");
    }
    public function delete($value)
    {
        $this->deleteSubCuenta_id = $value;
    }
    public function delete_now()
    {
        SubCuenta::find($this->deleteSubCuenta_id)->delete();
        return session()->flash("success", "Se elimino correctamente");
    }
}
