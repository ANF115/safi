<?php

namespace App\Http\Livewire\Catalogo;

use Livewire\Component;
use App\Models\Catalogo;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class Registro extends Component
{
    public $empresa_id,$nombre_catalogo;
    public $coduser;
    protected $rules = [
        'empresa_id'=> 'required',
        'nombre_catalogo'=> 'required',
        
    ];

    use WithPagination;

    public function render()
    {   $coduser=Auth::user()->id;
        $this->usuarios = User::all()->where('id',$coduser);

        return view('livewire.catalogo.registro');
    }

     ##catalogo##
     public function save()
     {   try{
         $this->validate();
        
         $newValue = Catalogo::create([
             'empresa_id'=> $this->empresa_id,
             'nombre_catalogo' => $this->nombre_catalogo,
             
         ]);

         
         $newValue->save();
        
         $this->clear();
         return session()->flash("success", "Se guardo correctamente");
         
        }catch(Exception $e){
            return session()->flash("fail", "Solo se puede registrar un catálogo por empresa");
        }
        
     }
 
     public function clear()
     {
         $this->empresa_id= "";
         $this->nombre_catalogo = '';
         
     }
     
}
