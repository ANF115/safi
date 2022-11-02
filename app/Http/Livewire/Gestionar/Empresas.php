<?php

namespace App\Http\Livewire\Gestionar;

use Livewire\Component;
use App\Models\User;
use App\Models\Rubro;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class Empresas extends Component
{

    public $name, $rubro_id, $rombre_empresa,$email, $selectedUser,$deleteUser_id,$search;
    protected $rules = [
        'nombre_empresa'=>'required',
        'rubro_id'=>'required',
        'name'=>'required',
        'email'=>'required',
       

    ];
    use WithPagination;
    public function render()
    {   $this->rubros = Rubro::all();
        $this->usuarioss= User::all();
        return view('livewire.gestionar.empresas',[
            'usuarios' => User::where('nombre_empresa', 'like', '%' . $this->search . '%')->where('role_id', '!=', 1)->paginate(5),
        ]);
    }
}
