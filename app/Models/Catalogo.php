<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;
    protected $fillable = [
        'empresa_id',
        'nombre_catalogo',
        
        
    ];

    public function empresa()
    {
        return $this->belongsTo(User::class);
    }
}
