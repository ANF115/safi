<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoCuenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'cuenta_id',
        'periodo_id',
        'valor',
    ];
    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
