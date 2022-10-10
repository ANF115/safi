<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentificacionCuenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'cuenta_id',
        'calculo_cuenta_id',
    ];
    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }
    public function calculo_cuenta()
    {
        return $this->belongsTo(CalculoCuenta::class);
    }
}
