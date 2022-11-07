<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoCuentaM extends Model
{
    use HasFactory;
    protected $fillable = [
        'cuenta_mayor_id',
        'periodo_id',
        'total',
    ];
    public function cuenta_mayor()
    {
        return $this->belongsTo(CuentaMayor::class);
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
