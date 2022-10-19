<?php

namespace App\Http\Livewire\Catalogo;

use Livewire\Component;
use App\Models\Cuenta;
use App\Models\CuentaMayor;
use App\Models\SubCuenta;
use Livewire\WithPagination;

class CatalogoManual extends Component
{   
    protected $rules = [
        
        

    ];

    use WithPagination;
    public function render()
    {   
        return view('livewire.catalogo.catalogo-manual');
    }
}
