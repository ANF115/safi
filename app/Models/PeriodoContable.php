<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoContable extends Model
{
    use HasFactory;
    protected $fillable = [
        'catalogo_id',
        'periodo_id',
    ];
    public function catalogo()
    {
        return $this->belongsTo(Catalogo::class);
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
