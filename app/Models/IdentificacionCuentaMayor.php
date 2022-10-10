<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentificacionCuentaMayor extends Model
{
    use HasFactory;
    protected $fillable = [
        'cuenta_mayor_id',
        'calculo_cuenta_mayor_id',
    ];
    public function cuenta_mayor()
    {
        return $this->belongsTo(CuentaMayor::class);
    }
    public function calculo_cuenta_mayor()
    {
        return $this->belongsTo(CalculoCuentaMayor::class);
    }
}
