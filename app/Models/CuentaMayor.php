<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaMayor extends Model
{
    use HasFactory;
    protected $fillable = [
        'catalogo_id',
        'codigo_cuenta_mayor',
        'nombre_cuenta_mayor',
        
        
    ];

    public function catalogo()
    {
        return $this->belongsTo(Catalogo::class);
    }
}
