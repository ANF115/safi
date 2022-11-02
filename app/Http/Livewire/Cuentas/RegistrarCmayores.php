<?php

namespace App\Http\Livewire\Cuentas;

use Livewire\Component;
use App\Models\Catalogo;
use App\Models\CuentaMayor;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class RegistrarCmayores extends Component
{
    public $search,$nombre_cuenta_mayor,$catalogo_id,$codigo_cuenta_mayor,$deleteCuentaMayor_id,$selectedCuentaMayor,$cuenta_mayor_id;
    
    public $edit_codigo_cuenta_mayor,$edit_nombre_cuenta_mayor;

    protected $rules = [

        
        'nombre_cuenta_mayor'=> 'required',
        
        
        'codigo_cuenta_mayor'=> 'required',
        'catalogo_id'=> 'required',
        
        

    ];
    use WithPagination;


    public function render()
    {   $this->catalogos = Catalogo::all();
        $this->cuentasmay= CuentaMayor::all();
        return view('livewire.cuentas.registrar-cmayores',[
            'cuentasmay' => CuentaMayor::where('nombre_cuenta_mayor', 'like', '%' . $this->search . '%')->paginate(5),
        ]);
    }

    public function save()
    {   $this->validate();
       
        $newVal = CuentaMayor::create([
            'catalogo_id'=> $this->catalogo_id,
            'codigo_cuenta_mayor'=> $this->codigo_cuenta_mayor,
            'nombre_cuenta_mayor' => $this->nombre_cuenta_mayor,
            
        ]);
        $newVal->save();
        $this->clear();
        return session()->flash("success", "Se guardo correctamente");
    }

    public function clear()
    {
        $this->catalogo_id = '';
        $this->codigo_cuenta_mayor = '';
        $this->nombre_cuenta_mayor = '';
        
        
    }

    

    public function edit($value)
    {
        //dd($value);
        $this->clear();
        $this->selectedCuentaMayor=CuentaMayor::find($value);
        $this->edit_codigo_cuenta_mayor = CuentaMayor::find($value)->codigo_cuenta_mayor;
        $this->edit_nombre_cuenta_mayor= CuentaMayor::find($value)->nombre_cuenta_mayor;
        //dd($this->editname);

    }

    public function save_edit()
    {   $this->validate();
        $this->selectedCuentaMayor->update([
            'codigo_cuenta_mayor' => $this->edit_codigo_cuenta_mayor,
            'nombre_cuenta_mayor'=> $this->edit_nombre_cuenta_mayor,
        ]);
        return session()->flash("success", "Se actualizo correctamente");
    }

    public function delete($value)
    {
        $this->deleteCuentaMayor_id = $value;
    }
    public function delete_now()
    {
        CuentaMayor::find($this->deleteCuentaMayor_id)->delete();
        return session()->flash("success", "Se elimino correctamente");
    }


    
   


}
