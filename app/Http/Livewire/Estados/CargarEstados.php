<?php

namespace App\Http\Livewire\Estados;

use Livewire\Component;
use Livewire\WithFileUploads;

class CargarEstados extends Component
{
    use WithFileUploads;
 
    public $estadosFinancieros;
 
    public function save()
    {
        $this->validate([
            'estadosFinancieros' => 'file|max:1024|mimes:xlsx', // 1MB Max
        ]);
 
        $this->estadosFinancieros->store('public');
    }
    public function render()
    {
        return view('livewire.estados.cargar-estados');
    }
}
