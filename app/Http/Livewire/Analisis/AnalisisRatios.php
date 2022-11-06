<?php

namespace App\Http\Livewire\Analisis;

use Livewire\Component;
use App\Models\Catalogo;
use App\Models\Periodo;
use App\Models\Categoria;
use App\Models\Ratio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AnalisisRatios extends Component
{
    //Definiendo variables
    public $codEmpresa, $periodoSelect=[], $categoriasSelect=[],$nombre, $ratio,$ratios=[],
           $nombreCategorias=[],$categorias,$nombreCat,$periodos,$yearPeriodos=[],$year,
           $ventasNetas, $promCxCComerciales, $valorPeriodoIn, $valorPeriodoFin;

    public function render()
    {
        //Consultando periodos de la empresa
        $codEmpresa=Auth::user()->id;
        $this->catalogos = Catalogo::firstWhere('empresa_id',$codEmpresa);
        $this->periodos= Periodo::all()->where('catalogo_id',$this->catalogos->id);
        //Consultando las categorias de analisis
        $this->categorias=Categoria::all();
        return view('livewire.analisis.analisis-ratios');
    }
    //Método para analizar los ratios
    public function analizarRatios()
    {
        //Consultando periodos seleccionados
        for($p=0;$p<sizeof($this->periodoSelect);$p++){
            $this->periodos=Periodo::where('id',$this->periodoSelect[$p])->get();
            for($y=0;$y<sizeof($this->periodos);$y++){
                $this->year=$this->periodos[$y];
                array_push($this->yearPeriodos,$this->year);
            }
        }
        
        for($i=0; $i<sizeof($this->categoriasSelect);$i++){
            //Consultando categorias seleccionadas
            $this->categorias=Categoria::where('id',$this->categoriasSelect[$i])->get();
            for($c=0;$c<sizeof($this->categorias);$c++){
                //Obteniendo datos de categoria
                $this->nombreCat=$this->categorias[$c];
                array_push($this->nombreCategorias,$this->nombreCat);
                //Consultando datos de los ratios
                $this->ratio= Ratio::where('categoria_id',$this->categoriasSelect[$i])->get();
                for($r=0;$r<sizeof($this->ratio);$r++){
                    $this->nombre=$this->ratio[$r];
                    array_push($this->ratios,$this->nombre);
                }
            }
            
        }
        // dd($this->categoriasSelect, $this->ratios);
    }
    //Ratios de Actividad
    //Método para calcular la razón de rotación de CXC
    public function razonRotacionCxC(){

    }
}
