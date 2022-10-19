<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoSubcuenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'subcuenta_id',
        'periodo_id',
    ];
    public function subcuenta()
    {
        return $this->belongsTo(SubCuenta::class);
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
