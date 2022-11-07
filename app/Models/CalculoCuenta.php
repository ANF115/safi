<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculoCuenta extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'nombre_calculo_cuenta',
        
        
    ];
}
