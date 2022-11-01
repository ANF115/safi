<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'cuenta_mayor_id',
        'codigo_cuenta',
        'nombre_cuenta',
        
        
    ];

    public function cuenta_mayor()
    {
        return $this->belongsTo(CuentaMayor::class);
    }
}
