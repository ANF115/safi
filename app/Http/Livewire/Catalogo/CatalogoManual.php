<?php

namespace App\Http\Livewire\Catalogo;

use Livewire\Component;
use App\Models\Cuenta;
use App\Models\CuentaMayor;
use App\Models\SubCuenta;
use App\Models\Catalogo;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class CatalogoManual extends Component
{   
    public $search,$empresa_id,$nombre_catalogo,$nombre_cuenta_mayor,$nombre_cuenta,$catalogo_id,$cuenta_mayor_id,$cuenta_id,$nombre_subcuenta,$subcuenta_id,
    $selectedcm,$deleteCuentaMayor_id,$codigo_cuenta_mayor,$codigo_cuenta,$codigo_subcuenta;
    protected $rules = [

        'nombre_catalogo'=> 'required',
        'catalogo_id'=> 'required',
        'nombre_cuenta_mayor'=> 'required',
        'nombre_cuenta'=> 'required',
        'nombre_subcuenta'=> 'required',
        'cuenta_id'=> 'required',
        'empresa_id'=> 'required',
        'subcuenta_id'=> 'required',
        'cuenta_mayor_id'=> 'required',
        'codigo_cuenta_mayor'=> 'required',
        'codigo_cuenta'=> 'required',
        'codigo_subcuenta'=> 'required',
        
        

    ];

    use WithPagination;
    public function render()
    {   $this->usuarios = User::all();
        $this->catalogos = Catalogo::all();
        $this->cuentas= Cuenta::all();
        $this->subcuentas = SubCuenta::all();
        $this->cuentasmay= CuentaMayor::all();
        $this->subcuentass = SubCuenta::all();
        $this->cuentass= Cuenta::all();

        return view('livewire.catalogo.catalogo-manual',[
            
            'cuentasmay' => CuentaMayor::where('nombre_cuenta_mayor', 'like', '%' . $this->search . '%')->paginate(5),
            
        ]);
    }
    ##catalogo##
    public function save_cata()
    {   
        $this->validate();
       
        $newValue = Catalogo::create([
            'empresa_id'=> $this->empresa_id,
            'nombre_catalogo' => $this->nombre_catalogo,
            
        ]);
        $newValue->save();
        dd($this->newValue);
       
        return session()->flash("success", "Se guardo correctamente");
        $this->clear();
    }

    public function clear()
    {
        $this->empresa_id= "";
        $this->nombre_catalogo = '';
        
    }

    ##cuenta mayor##
    public function save_CM()
    {   $this->validate();
       
        $newVal = CuentaMayor::create([
            'catalogo_id'=> $this->nombre_cuenta_mayor,
            'codigo_cuenta_mayor'=> $this->nombre_cuenta_mayor,
            'nombre_cuenta_mayor' => $this->nombre_cuenta_mayor,
            
        ]);
        $newVal->save();
        $this->clear_CM();
        return session()->flash("success", "Se guardo correctamente");
    }

    public function clear_CM()
    {
        $this->catalogo_id = '';
        $this->nombre_cuenta_mayor = '';
        
        
    }

    public function edit_cm($value)
    {
        //dd($value);
        $this->clear();
        $this->selectedcm=CuentaMayor::find($value);
        $this->codigo_cuenta_mayor = CuentaMayor::find($value)->codigo_cuenta_mayor;
        $this->nombre_cuenta_mayor = CuentaMayor::find($value)->nombre_cuenta_mayor;
        //dd($this->editname);

    }
    public function save_edit_cm()
    {   $this->validate();
        $this->selectedcm->update([
            'codigo_cuenta_mayor' => $this->codigo_cuenta_mayor,
            'nombre_cuenta_mayor'=> $this->nombre_cuenta_mayor,
        ]);
        return session()->flash("success", "Se actualizo correctamente");
    }
    public function delete_cm($value)
    {
        $this->deleteCuentaMayor_id = $value;
    }
    public function delete_now_cm()
    {
        CuentaMayor::find($this->deleteCuentaMayor_id)->delete();
        return session()->flash("success", "Se elimino correctamente");
    }


    ##cuenta##

    public function save_Cuenta()
    {   $this->validate();
       
        $newV = Cuenta::create([
            'cuenta_mayor_id' => $this->cuenta_mayor_id,
            'codigo_cuenta'=> $this->codigo_cuenta,
            'nombre_cuenta'=> $this->nombre_cuenta,
            
        ]);
        $newV->save();
        $this->clear_Cuenta();
        return session()->flash("success", "Se guardo correctamente");
    }

    public function clear_Cuenta()
    {
        $this->cuenta_mayor_id = '';
        $this->nombre_cuenta = '';
       
        
    }

    ##subcuenta##

    public function save_SC()
    {   $this->validate();
       
        $newValu = SubCuenta::create([
            'cuenta_id' => $this->cuenta_id,
            'codigo_subcuenta'=> $this->codigo_subcuenta,
            'nombre_subcuenta'=> $this->nombre_subcuenta,
            
        ]);
        $newValu->save();
        $this->clear_SC();
        return session()->flash("success", "Se guardo correctamente");
    }


    public function clear_SC()
    {
        $this->cuenta_id = '';
        $this->nombre_subcuenta = '';
        
        
    }

    



}
