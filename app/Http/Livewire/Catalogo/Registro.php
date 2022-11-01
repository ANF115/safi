<?php

namespace App\Http\Livewire\Catalogo;

use Livewire\Component;
use App\Models\Catalogo;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class Registro extends Component
{
    public $empresa_id,$nombre_catalogo;

    protected $rules = [
        'empresa_id'=> 'required',
        'nombre_catalogo'=> 'required',
        
    ];

    use WithPagination;

    public function render()
    {
        $this->usuarios = User::all();

        return view('livewire.catalogo.registro');
    }

     ##catalogo##
     public function save()
     {   
         $this->validate();
        
         $newValue = Catalogo::create([
             'empresa_id'=> $this->empresa_id,
             'nombre_catalogo' => $this->nombre_catalogo,
             
         ]);
         $newValue->save();
        
         $this->clear();
         return session()->flash("success", "Se guardo correctamente");
         
     }
 
     public function clear()
     {
         $this->empresa_id= "";
         $this->nombre_catalogo = '';
         
     }
     
}
