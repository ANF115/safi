<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCuenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'cuenta_id',
        'nombre_subcuenta',
        'valor',
        
        
    ];

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }
}
