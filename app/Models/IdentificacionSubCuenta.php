<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentificacionSubCuenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'subcuenta_id',
        'calculo_subcuenta_id',
    ];
    public function subcuenta()
    {
        return $this->belongsTo(SubCuenta::class);
    }
    public function calculo_subcuenta()
    {
        return $this->belongsTo(CalculoSubCuenta::class);
    }
}
