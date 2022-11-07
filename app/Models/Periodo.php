<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'fecha_inicio',
        'fecha_fin',
        'catalogo_id'
    ];
    public function catalogo()
    {
        return $this->belongsTo(Catalogo::class);
    }
}
