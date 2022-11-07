<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'rubro_id',
        'ratio_id',
        'nombre_referencia',
        'valor_maximo',
        'valor_minimo',
        
    ];

    public function ratio()
    {
        return $this->belongsTo(Ratio::class);
    }

    public function rubro()
    {
        return $this->belongsTo(Rubro::class);
    }


}
